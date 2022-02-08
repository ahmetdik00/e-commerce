<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static truncate()
 * @method static create(array $array)
 */
class Urun extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'urun';
    protected $guarded = [];

    public function kategoriler() {

        return $this->belongsToMany(Kategori::class, 'kategori_urun');
    }

    public function detay() {
        return $this->hasOne(UrunDetay::class);
    }
}
