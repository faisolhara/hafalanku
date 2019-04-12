<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AyatAlquran extends Model
{
    const AL_FATIHAH = 'Al Fatihah';

    protected $table = 'ayat_alquran';
    public $timestamps = false;

    protected $fillable = [
        'surat', 'nomor_surat', 'ayat', 'juz', 'hafalan',
    ];
}
