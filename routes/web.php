<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BaristaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransactionController;
use App\Models\Pemesanan;
use App\Http\Controllers\PaymentCallbackController;
use App\Models\BahanBaku;
use App\Models\Konsumen;
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
Route::get('konsumen/Konfirmasi_Pemesanan/{id}', [KonsumenController::class, 'Konsumen_ShowKonfirmasiPemesanan'])->name('show_konfirmasi_pemesanan');
Route::patch('konsumen/Konfirmasi_Pemesanan_id/{id}', [PemesananController::class, 'KonfirmasiPesanan'])->name('KonfirmasiPesanan');
Route::get('konsumen/Pembayaran_QRIS/{id}', [PemesananController::class, 'Bayar_QRIS'])->name('Bayar_QRIS');

// Route::get('konsumen/show', [TransactionController::class, 'show'])->name('konsumen.show');

Route::get('konsumen/show/{order_id}', [TransactionController::class, 'show'])->name('konsumen.show');
Route::post('konsumen/midtrans-notification', [TransactionController::class, 'receive']);


//Kasir
Route::get('kasir/home', [HomeController::class, 'kasirHome'])->name('kasir.home')->middleware('is_kasir');
Route::get('kasir/ShowPemesanan', [KasirController::class, 'Kasir_ShowPemesanan'])->name('kasir.show_pemesanan')->middleware('is_kasir');
Route::patch('kasir/Kasir_KonfirmasiPembayaran/{id}', [KasirController::class, 'Kasir_KonfirmasiPembayaran'])->name('kasir.konfirmasi_pemesanan')->middleware('is_kasir');
Route::get('kasir/stok_produk', [KasirController::class, 'Kasir_StokProduk'])->name('Kasir_StokProduk')->middleware('is_kasir');


//Barista
Route::get('barista/home', [HomeController::class, 'baristaHome'])->name('barista.home')->middleware('is_barista');
Route::get('barista/ShowPemesanan', [BaristaController::class, 'Barista_ShowPemesanan'])->name('barista.show_pemesanan')->middleware('is_barista');
Route::get('barista/stok_produk', [BaristaController::class, 'Barista_StokProduk'])->name('Barista_StokProduk')->middleware('is_barista');



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

//Owner.Stok Bahan
Route::get('owner/stok_bahan', [BahanBakuController::class, 'index'])->name('index')->middleware('is_owner');


Route::resource('orders', OrderController::class)->only(['index', 'show']);
Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);

Route::get('konsumen/ShowKopiMenu', [KonsumenController::class, 'ShowKopiMenu'])->name('konsumen.showkopimenu');
Route::get('konsumen/ShowNonKopiMenu', [KonsumenController::class, 'ShowNonKopiMenu'])->name('konsumen.shownonkopimenu');

Route::get('konsumen/CetakPesanan', [PemesananController::class, 'CetakPesanan'])->name('CetakPesanan');
