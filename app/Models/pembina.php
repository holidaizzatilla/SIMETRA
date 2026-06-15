<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembina extends Model
{
    protected $table = 'pembinas';

    protected $fillable = [
        'nama_pembina',
        'periode',
        'aktif',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
