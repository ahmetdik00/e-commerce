<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $id)
 */
class Kategori extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kategori';
    //protected $fillable = ['kategori_adi', 'slug'];
    protected $guarded = [];
    //const CREATED_AT = 'olusturulma_tarihi';
    //const UPDATED_AT = 'guncelleme_tarihi';
    //const DELETED_AT = 'silinme_tarihi';

    public function urunler() {

        return $this->belongsToMany(Urun::class, 'kategori_urun');
    }
}
