<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    protected $table = 'hafalan';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_awal', 'tanggal_akhir', 'user_id',
    ];

    public function getAyatAwalHafalan()
    {
        $query = \DB::table('ayat_alquran')
                    ->join('detail_hafalan', 'detail_hafalan.ayat_alquran_id', '=', 'ayat_alquran.id')
                    ->where('detail_hafalan.hafalan_id', '=', intval($this->id))
                    ->orderBy('detail_hafalan.id', 'asc');

        return $query->first();
    }

    public function getAyatAkhirHafalan()
    {
        $query = \DB::table('ayat_alquran')
                    ->join('detail_hafalan', 'detail_hafalan.ayat_alquran_id', '=', 'ayat_alquran.id')
                    ->where('detail_hafalan.hafalan_id', '=', intval($this->id))
                    ->orderBy('detail_hafalan.id', 'desc');

        return $query->first();
    }
}
