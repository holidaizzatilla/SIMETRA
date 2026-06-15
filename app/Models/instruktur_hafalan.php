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
}
