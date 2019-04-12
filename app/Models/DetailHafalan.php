<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailHafalan extends Model
{
    protected $table = 'detail_hafalan';
    public $timestamps = false;

    protected $fillable = [
        'hafalan_id', 'ayat_alquran_id',
    ];
}
