<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class murojaah extends Model
{
    protected $table = 'murojaah';

    protected $fillable = [
        'instruktur_murojaah_id',
        'nis',
        'juz',
        'surah',
        'halaman',
        'catatan',
        'kehadiran',
        'tanggal',
    ];


}
