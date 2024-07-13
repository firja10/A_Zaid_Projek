<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');    
});

Auth::routes();

//Home 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Konsumen
Route::get('konsumen/home', [HomeController::class, 'konsumenHome'])->name('konsumen.home')->middleware('is_konsumen');
Route::get('konsumen/ShowQRMenu', [ProdukController::class, 'ShowQRMenu']);
Route::get('konsumen/ShowPromoMenu', [KonsumenController::class, 'ShowPromoMenu']);
Route::get('konsumen/ShowAllMenu', [KonsumenController::class, 'ShowAllMenu']);
Route::post('konsumen_pemesanan', [PemesananController::class, 'PesanMenu'])->name('PesanMenu');


//Kasir
Route::get('kasir/home', [HomeController::class, 'kasirHome'])->name('kasir.home')->middleware('is_kasir');
Route::get('kasir/ShowPemesanan', [KasirController::class, 'Kasir_ShowPemesanan'])->name('kasir.show_pemesanan')->middleware('is_kasir');



//Barista
Route::get('barista/home', [HomeController::class, 'baristaHome'])->name('barista.home')->middleware('is_barista');

//Owner
Route::get('owner/home', [HomeController::class, 'ownerHome'])->name('owner.home')->middleware('is_owner');

//Owner.Produk
Route::get('owner/stok_produk', [ProdukController::class, 'StokProduk'])->name('StokProduk')->middleware('is_owner');
Route::get('owner/stok_produk/store', [ProdukController::class, 'StokProdukForm'])->name('StokProdukForm')->middleware('is_owner');
Route::post('owner/stok_produk', [ProdukController::class, 'StokProdukStore'])->name('StokProdukStore')->middleware('is_owner');
Route::get('owner/stok_produk/{id}', [ProdukController::class, 'StokProdukEdit'])->name('StokProdukEdit')->middleware('is_owner');
Route::patch('owner/stok_produk/{id}', [ProdukController::class, 'StokProdukUpdate'])->name('StokProdukUpdate')->middleware('is_owner');
Route::delete('owner/stok_produk/{id}', [ProdukController::class, 'StokProdukDelete'])->name('StokProdukDelete')->middleware('is_owner');

//Owner.Penjualan / Pemesanan
Route::get('owner/pemesanan', [OwnerController::class, 'Pemesanan'])->name('Pemesanan')->middleware('is_owner');

Route::get('/showQR', [ProdukController::class, 'showQR']);