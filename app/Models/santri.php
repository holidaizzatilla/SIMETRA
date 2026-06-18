<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    protected $table = 'santris';

    protected $fillable = [
        'nis',
        'nama_santri',
        'jk',
        'kamar',
        'jumlah_hafalan_juz',
    ];
    public function setoran_hafalan() {
        return $this->hasMany(setoran_hafalan::class);
    }
    public function wali_santri() {
        return $this->hasOne(wali_santri::class);
    }
}
