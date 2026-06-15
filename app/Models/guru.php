<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'gurus';
   
    protected $fillable = [
        'nama_guru',
        'jk',
        'no_telp',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
