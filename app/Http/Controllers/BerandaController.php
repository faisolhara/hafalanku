<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perkembanganHafalan = $this->getPerkembanganHafalan();
        $persentaseHafalan = $this->getPersentaseHafalan();

        return view('beranda', [
            'perkembanganHafalan' => $perkembanganHafalan,
            'persentaseHafalan' => $persentaseHafalan,
        ]);
    }

    protected function getPerkembanganHafalan()
    {
        $now = new \DateTime();
        $year = $now->format('Y');
        $dataBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nop', 'Des'];
        $dataTotalAyat = [];

        for ($month = 1; $month <= 12; $month++) {
            $tanggal = new \DateTime($year.'-'.$month.'-1');
            if (intval($tanggal->format('Ym')) > intval($now->format('Ym'))) {
                break;
            }

            $tanggalBatas = \App\Services\TimezoneDateConverter::getServerDateTime($tanggal->format('Y-m-t 23:59:59'));

            $query = \DB::table('ayat_alquran')
                            ->select('ayat_alquran.id')
                            ->join('detail_hafalan', 'detail_hafalan.ayat_alquran_id', '=', 'ayat_alquran.id')
                            ->join('hafalan', 'detail_hafalan.hafalan_id', '=', 'hafalan.id')
                            ->where('hafalan.tanggal_akhir', '<=', $tanggalBatas->format('Y-m-d H:i:s'))
                            ->where('hafalan.user_id', '=', \Auth::user()->id);

            $dataTotalAyat[] = $query->count(\DB::raw('DISTINCT ayat_alquran.id'));
        }

        return ['bulan' => $dataBulan, 'totalAyat' => $dataTotalAyat];
    }

    protected function getPersentaseHafalan()
    {
        $dataPersentase = [];

        for ($juz = 1; $juz <= 30; $juz++) {
            $queryAyatJuz = \DB::table('ayat_alquran')
                                    ->where('ayat_alquran.juz', '=', $juz);
            $ayatJuz = $queryAyatJuz->count();

            $queryAyatHafalan = \DB::table('ayat_alquran')
                                    ->select('ayat_alquran.id')
                                    ->join('detail_hafalan', 'detail_hafalan.ayat_alquran_id', '=', 'ayat_alquran.id')
                                    ->join('hafalan', 'detail_hafalan.hafalan_id', '=', 'hafalan.id')
                                    ->where('ayat_alquran.juz', '=', $juz)
                                    ->where('hafalan.user_id', '=', \Auth::user()->id);

            $ayatHafalan = $queryAyatHafalan->count(\DB::raw('DISTINCT ayat_alquran.id'));

            $persentase = !empty($ayatJuz) ? intval(ceil($ayatHafalan / $ayatJuz * 100)) : 0;
            $dataPersentase[] = [
                'juz' => 'Juz '.$juz,
                'persentase' => $persentase,
            ];
        }

        return $dataPersentase;
    }
}
