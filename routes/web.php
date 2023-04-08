<?php

use App\Http\Livewire\UserHome;
use App\Http\Livewire\DataBahan;
use App\Http\Livewire\DataProduk;
use App\Http\Livewire\UserProduk;
use App\Http\Livewire\UserPesanan;
use App\Http\Livewire\DataProduksi;
use App\Http\Livewire\LaporanBahan;
use App\Http\Livewire\DataPelanggan;
use App\Http\Livewire\DataPenjualan;
use App\Http\Livewire\UserKeranjang;
use App\Http\Livewire\DataBahanmasuk;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LaporanProduksi;
use App\Http\Livewire\LaporanPenjualan;
use App\Http\Livewire\UserKontak;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pelanggan',DataPelanggan::class)->name('pelanggan');
Route::get('/produk',DataProduk::class)->name('produk');
Route::get('/bahan',DataBahan::class)->name('bahan');
Route::get('/bahan',DataBahan::class)->name('bahan');
Route::get('/pemasukan-bahan',DataBahanmasuk::class)->name('pemasukan-bahan');
Route::get('/produksi',DataProduksi::class)->name('produksi');
Route::get('/penjualan',DataPenjualan::class)->name('penjualan');
Route::get('/laporan-bahan',LaporanBahan::class)->name('laporan-bahan');
Route::get('/laporan-produksi',LaporanProduksi::class)->name('laporan-produksi');
Route::get('/laporan-penjualan',LaporanPenjualan::class)->name('laporan-penjualan');

// pelanggan
Route::get('/',UserHome::class);
Route::get('/u/produk',UserProduk::class);
Route::get('/u/keranjang',UserKeranjang::class);
Route::get('/u/pesanan',UserPesanan::class);
Route::get('/u/kontak',UserKontak::class);
