<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instruktur_murojaah extends Model
{
    protected $table = 'instruktur_murojaah';

    protected $fillable = [
        'guru_id',
        'aktif',
    ];
    
}
