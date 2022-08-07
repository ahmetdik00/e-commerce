<?php

use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\OdemeController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\KullaniciController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AnasayfaController::class, 'index'])->name('anasayfa');

Route::get('/kategori/{slug_kategoriadi}', [KategoriController::class, 'index'])->name('kategori');

Route::get('/urun/{slug_urunadi}', [UrunController::class, 'index'])->name('urun');

Route::post('/ara', [UrunController::class, 'ara'])->name('urun_ara');
Route::get('/ara', [UrunController::class, 'ara'])->name('urun_ara');

Route::prefix('sepet')->group(function () {
    Route::get('/', [SepetController::class, 'index'])->name('sepet');
    Route::post('/ekle', [SepetController::class, 'ekle'])->name('sepet.ekle');
    Route::delete('/kaldir/{rowid}', [SepetController::class, 'kaldir'])->name('sepet.kaldir');
    Route::delete('/bosalt', [SepetController::class, 'bosalt'])->name('sepet.bosalt');
    Route::patch('/guncelle/{rowid}', [SepetController::class, 'guncelle'])->name('sepet.guncelle');
});

Route::get('/odeme', [OdemeController::class, 'index'])->name('odeme');
Route::post('/odemeyap', [OdemeController::class, 'odemeyap'])->name('odemeyap');

Route::middleware('auth')->group(function () {
    Route::get('/siparisler', [SiparisController::class, 'index'])->name('siparisler');
    Route::get('/siparisler/{id}', [SiparisController::class, 'detay'])->name('siparis');
});

Route::prefix('kullanici')->group(function () {
    Route::get('/oturumac', [KullaniciController::class, 'giris_form'])->name('kullanici.oturumac');
    Route::post('/oturumac', [KullaniciController::class, 'giris']);
    Route::get('/kaydol', [KullaniciController::class, 'kaydol_form'])->name('kullanici.kaydol');
    Route::post('/kaydol', [KullaniciController::class, 'kaydol']);
    Route::get('/aktiflestir/{anahtar}', [KullaniciController::class, 'aktiflestir'])->name('aktiflestir');
    Route::post('/oturumukapat', [KullaniciController::class, 'oturumukapat'])->name('kullanici.oturumukapat');
});

Route::get('/test/mail', function (){
    $kullanici = \App\Models\Kullanici::find(1);
    return new App\Mail\KullaniciKayitMail($kullanici);
});
