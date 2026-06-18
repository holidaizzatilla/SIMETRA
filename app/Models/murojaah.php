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
public function instruktur_murojaah() {
    return $this->belongsTo(instruktur_murojaah::class,);
}

}
