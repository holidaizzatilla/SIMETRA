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
}
