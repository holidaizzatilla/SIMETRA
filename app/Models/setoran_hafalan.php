<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setoran_hafalan extends Model
{
    protected $table = 'setoran_hafalan';

    protected $fillable = [
        'instruktur_hafalan_id',
        'nis',
        'juz',
        'surah',
        'halaman',
        'catatan',
        'kehadiran',
        'tanggal',
    ];
}
