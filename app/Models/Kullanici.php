<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kullanici';

    protected $fillable = [
        'adsoyad',
        'email',
        'sifre',
        'aktivasyon_anahtari',
        'aktif_mi'
    ];

    protected $hidden = [
        'sifre',
        'aktivasyon_anahtari'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->sifre;
    }

    public function detay() {
        return $this->hasOne('App\Models\KullaniciDetay');
    }
}
