<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 */
class UrunDetay extends Model
{
    use HasFactory;
    protected $table = 'urun_detay';

    public $timestamps = false;

    public function urun() {
        return $this->belongsTo(Urun::class);
    }
}
