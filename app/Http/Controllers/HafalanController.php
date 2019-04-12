<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use App\Models\AyatAlquran;
use App\Models\Hafalan;
use App\Models\DetailHafalan;

class HafalanController extends Controller
{
    const URL = '/hafalan';

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            \Session::put(self::CLASS, $request->all());
            return redirect(self::URL);
        }

        $filters = \Session::get(self::CLASS);
        $qb = \DB::table('hafalan')
                    ->select('hafalan.*')
                    ->join('detail_hafalan', 'detail_hafalan.hafalan_id', '=', 'hafalan.id')
                    ->join('ayat_alquran', 'detail_hafalan.ayat_alquran_id', '=', 'ayat_alquran.id')
                    ->where('hafalan.user_id', '=', \Auth::user()->id)
                    ->groupBy('hafalan.id')
                    ->orderBy('hafalan.tanggal_awal', 'desc')
                    ->orderBy('hafalan.id', 'desc');

        if (!empty($filters['surat'])) {
            $qb->where('ayat_alquran.surat', '=', $filters['surat']);
        }

        if (!empty($filters['juz'])) {
            $qb->where('ayat_alquran.juz', '=', $filters['juz']);
        }

        if (!empty($filters['tanggalAwal'])) {
            $tanggalAwal = \App\Services\TimezoneDateConverter::getServerDateTime($filters['tanggalAwal'] . ' 00:00:00');
            $qb->where('hafalan.tanggal_awal',  '>=', $tanggalAwal->format('Y-m-d H:i:s'));
        }

        if (!empty($filters['tanggalAkhir'])) {
            $tanggalAkhir = \App\Services\TimezoneDateConverter::getServerDateTime($filters['tanggalAkhir'] . ' 23:59:59');
            $qb->where('hafalan.tanggal_akhir',  '<', $tanggalAkhir->format('Y-m-d H:i:s'));
        }

        return view('hafalan.index', [
            'url' => self::URL,
            'filters' => $filters,
            'data' => $qb->paginate(10),
            'optionSurat' => $this->getOptionSurat(),
            'optionJuz' => $this->getOptionJuz(),
        ]);
    }

    public function tambah(Request $request)
    {
        $suratAwal = $request->get('suratAwal');
        $suratAkhir = $request->get('suratAkhir');

        $model = new Hafalan();
        $now = new \DateTime();
        $model->tanggal_akhir = $now->format('Y-m-d H:i:s');

        $now->sub(new \DateInterval('PT1H'));
        $model->tanggal_awal = $now->format('Y-m-d H:i:s');

        return view('hafalan.tambah', [
            'url' => self::URL,
            'model' => $model,
            'optionSurat' => $this->getOptionSurat(),
        ]);
    }

    public function ubah(Request $request, $id)
    {
        $model = Hafalan::find($id);
        if ($model === null) {
            abort(404);
        }

        $objAyatAwal = $model->getAyatAwalHafalan();
        $suratAwal = $objAyatAwal !== null ? $objAyatAwal->surat : '';

        $objAyatAkhir = $model->getAyatAkhirHafalan();
        $suratAkhir = $objAyatAkhir !== null ? $objAyatAkhir->surat : '';

        return view('hafalan.tambah', [
            'url' => self::URL,
            'model' => $model,
            'optionSurat' => $this->getOptionSurat(),
        ]);
    }

    public function getAyatSurat(Request $request)
    {
        $surat = $request->get('surat');
        $qb = \DB::table('ayat_alquran')
                    ->select('ayat_alquran.ayat')
                    ->where('ayat_alquran.surat', '=', $surat)
                    ->orderBy('ayat_alquran.ayat', 'asc');

        $ayats = $qb->get();

        return response()->json($ayats);
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'tanggalAwal' => 'required|date',
            'suratAwal' => 'required',
            'ayatAwal' => 'required',
            'tanggalAkhir' => 'required|date|after:tanggalAwal',
            'suratAkhir' => 'required',
            'ayatAkhir' => 'required',
        ], [
            'tanggalAwal.required' => 'Data tidak lengkap',
            'tanggalAwal.date' => 'Tanggal Awal tidak valid',
            'suratAwal.required' => 'Data tidak lengkap',
            'ayatAwal.required' => 'Data tidak lengkap',
            'tanggalAkhir.required' => 'Data tidak lengkap',
            'tanggalAkhir.date' => 'Tanggal Awal tidak valid',
            'tanggalAkhir.after' => 'Tanggal akhir harus lebih besar dari tanggal awal',
            'suratAkhir.required' => 'Data tidak lengkap',
            'ayatAkhir.required' => 'Data tidak lengkap',
        ]);

        $id = intval($request->get('id'));
        $hafalan = empty($id) ? new Hafalan() : Hafalan::find($id);
        if ($hafalan === null) {
            abort(404);
        }

        $tanggalAwal = \App\Services\TimezoneDateConverter::getServerDateTime($request->get('tanggalAwal'));
        $hafalan->tanggal_awal = $tanggalAwal->format('Y-m-d H:i:s');

        $tanggalAkhir = \App\Services\TimezoneDateConverter::getServerDateTime($request->get('tanggalAkhir'));
        $hafalan->tanggal_akhir = $tanggalAkhir->format('Y-m-d H:i:s');

        $hafalan->user_id = \Auth::user()->id;
        $hafalan->save();

        $details = DetailHafalan::where('hafalan_id', '=', $id)->get();
        foreach ($details as $detail) {
            $detail->delete();
        }

        $ayatAwal = $this->getAyatAlquran($request->get('suratAwal'), $request->get('ayatAwal'));
        $ayatAkhir = $this->getAyatAlquran($request->get('suratAkhir'), $request->get('ayatAkhir'));

        if ($ayatAkhir->id >= $ayatAwal->id) {
            $ayats = $this->getAyatAlquranBetween($ayatAwal, $ayatAkhir);
        } else {
            $ayatAwalAlquran = \DB::table('ayat_alquran')->orderBy('id', 'asc')->first();
            $ayatAkhirAlquran = \DB::table('ayat_alquran')->orderBy('id', 'desc')->first();

            $ayats = array_merge(
                $this->getAyatAlquranBetween($ayatAwal, $ayatAkhirAlquran)->toArray(),
                $this->getAyatAlquranBetween($ayatAwalAlquran, $ayatAkhir)->toArray()
            );
        }

        foreach($ayats as $ayat) {
            $detail = new DetailHafalan();
            $detail->ayat_alquran_id = $ayat->id;
            $detail->hafalan_id = $hafalan->id;
            $detail->save();
        }

        \Session::flash(
            'successMessage',
            'Hafalan tanggal '.$request->get('tanggalAwal').' berhasil disimpan'
        );

        return redirect(self::URL);
    }

    public function hapus(Request $request)
    {
        $id = $request->get('id', 0);
        $model = Hafalan::find($id);
        if ($model === null) {
            abort(404);
        }

        $tanggalAwal = new \DateTime($model->tanggal_awal);
        $details = DetailHafalan::where('hafalan_id', '=', $id)->get();
        foreach($details as $detail) {
            $detail->delete();
        }

        $model->delete();

        \Session::flash(
            'successMessage',
            'Hafalan tanggal '.$tanggalAwal->format('d-m-Y H:i').' berhasil dihapus'
        );

        return redirect(self::URL);
    }

    protected function getAyatAlquran($surat, $ayat)
    {
        $qb = \DB::table('ayat_alquran')
                    ->where('ayat_alquran.surat', '=', $surat)
                    ->where('ayat_alquran.ayat', '=', $ayat)
                    ->orderBy('ayat_alquran.id', 'desc');

        return $qb->first();
    }

    protected function getAyatAlquranBetween($ayatAwal, $ayatAkhir)
    {
        $qb = \DB::table('ayat_alquran')
                    ->where('ayat_alquran.id', '>=', $ayatAwal->id)
                    ->where('ayat_alquran.id', '<=', $ayatAkhir->id)
                    ->orderBy('ayat_alquran.id', 'asc');

        return $qb->get();
    }

    protected function getOptionSurat()
    {
        $qb = \DB::table('ayat_alquran')
                    ->select('ayat_alquran.surat')
                    ->groupBy('ayat_alquran.surat', 'ayat_alquran.nomor_surat')
                    ->orderBy('ayat_alquran.nomor_surat', 'asc');

        return $qb->get();
    }

    protected function getOptionJuz()
    {
        $qb = \DB::table('ayat_alquran')
                    ->select('ayat_alquran.juz')
                    ->groupBy('ayat_alquran.juz')
                    ->orderBy('ayat_alquran.juz', 'asc');

        return $qb->get();
    }
}
