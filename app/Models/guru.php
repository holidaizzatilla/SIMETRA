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
    public function user() {
    return $this->belongsTo(User::class);
}
   public function instruktur_murojaah() {
    return $this->hasOne(instruktur_murojaah::class);
}
public function instruktur_hafalan() {
    return $this->hasMany(instruktur_hafalan::class);
}

}