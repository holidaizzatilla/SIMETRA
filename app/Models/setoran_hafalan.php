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
    public function instruktur_hafalan() {
        return $this->belongsTo(instruktur_hafalan::class);
    }
    public function santri() {
        return $this->belongsTo(santri::class);
    }
}
