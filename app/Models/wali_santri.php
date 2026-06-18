<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wali_santri extends Model
{
    protected $table = 'wali_santri';
    

    protected $fillable = [
        'nama_wali',
        'no_telp',
        'nis',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function santri() {
        return $this->belongsTo(santri::class);
    }
}
