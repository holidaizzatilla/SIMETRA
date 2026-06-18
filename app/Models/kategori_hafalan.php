<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori_hafalan extends Model
{
    protected $table = 'kategori_hafalan';

    protected $fillable = [
        'range_juz',
        'lokasi',
    ];
    public function instruktur_hafalan() {
        return $this->belongsTo(instruktur_hafalan::class);
    }
    
}
