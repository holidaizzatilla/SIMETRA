<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instruktur_hafalan extends Model
{
    protected $table = 'instruktur_hafalan';

    protected $fillable = [
        'guru_id',
        'kategori_hafalan_id',
        'aktif',
    ];
    public function guru() {
        return $this->belongsTo(guru::class);
    }
    public function kategori_hafalan() {
        return $this->hasMany(kategori_hafalan::class);
    }
    public function setoran_hafalan() {
        return $this->hasMany(setoran_hafalan::class);
    }
}
