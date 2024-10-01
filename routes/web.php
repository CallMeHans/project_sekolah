<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LappembelianController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PenggunaController;
use App\Models\Jenis;
use App\Models\Pembelian;
use App\Models\Suplier;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', ['title' => 'Aplikasi penjualan barang berbasis web dengan Framework Laravel']);
});

Route::get('home', function () {
    return view('home');
}); 

//DATA JENIS BARANG
Route::get('jenis', [JenisController::class, 'index'] )->name('jenis.index');
Route::delete('jenis/{id_jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy');
Route::get('jenis/create', [JenisController::class, 'create'])->name('jenis.create');
Route::post('jenis', [JenisController::class, 'store'])->name('jenis.store');
Route::get('jenis/show', [JenisController::class, 'show'])->name('jenis.show');
Route::get('jenis/{id_jenis}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
Route::put('jenis/{id_jenis}', [JenisController::class, 'update'])->name('jenis.update');


//DATA SUPLIER
Route::get('suplier', [SuplierController::class, 'index']) ->name('suplier.index');
Route::delete('suplier/{id_suplier}', [SuplierController::class, 'destroy'])->name('suplier.destroy');
Route::get('suplier/create', [SuplierController::class, 'create'])->name('suplier.create');
Route::post('suplier', [SuplierController::class, 'store'])->name('suplier.store');
Route::get('suplier/show', [SuplierController::class, 'show'])->name('suplier.show');
Route::get('suplier/{id_suplier}/edit', [SuplierController::class, 'edit'])->name('suplier.edit');
Route::put('suplier/{id_suplier}', [SuplierController::class, 'update'])->name('suplier.update');

//DATA BARANG
Route::get('barang', [BarangController::class, 'index']) ->name('barang.index');
Route::delete('barang/{kode_barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('barang/show', [BarangController::class, 'show'])->name('barang.show');
Route::get('barang/{kode_barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('barang/{kode_barang}', [BarangController::class, 'update'])->name('barang.update');

//DATA Pembelian
Route::get('Pembelian', [PembelianController::class, 'index']) ->name('Pembelian.index');
Route::delete('Pembelian/{nofak_beli}', [PembelianController::class, 'destroy'])->name('Pembelian.destroy');
Route::get('Pembelian/create', [PembelianController::class, 'create'])->name('Pembelian.create');
Route::post('Pembelian', [PembelianController::class, 'store'])->name('Pembelian.store');
Route::get('Pembelian/show', [PembelianController::class, 'show'])->name('Pembelian.show');
Route::get('Pembelian/{nofak_beli}/edit', [PembelianController::class, 'edit'])->name('Pembelian.edit');
Route::put('Pembelian/{nofak_beli}', [PembelianController::class, 'update'])->name('Pembelian.update');

//DATA Penjualan
Route::get('Penjualan', [PenjualanController::class, 'index']) ->name('Penjualan.index');
Route::delete('Penjualan/{nofak_beli}', [PenjualanController::class, 'destroy'])->name('Penjualan.destroy');
Route::get('Penjualan/create', [PenjualanController::class, 'create'])->name('Penjualan.create');
Route::post('Penjualan', [PenjualanController::class, 'store'])->name('Penjualan.store');
Route::get('Penjualan/show', [PenjualanController::class, 'show'])->name('Penjualan.show');
Route::get('Penjualan/{nofak_beli}/edit', [PenjualanController::class, 'edit'])->name('Penjualan.edit');
Route::put('Penjualan/{nofak_beli}', [PenjualanController::class, 'update'])->name('Penjualan.update');

//laporan Pembelian   
Route::get('lappembelian', [LappembelianController::class, 'index'])->name('lappembelian.index');
Route::post('datapembelian', [LappembelianController::class, 'show'])->name('lappembelian.show');

//Manajemen Akun
Route::get(uri: 'pengguna', action: [PenggunaController::class, 'index'])->name(name: 'pengguna.index');
Route::get(uri: 'pengguna/create', action: [PenggunaController::class, 'create'])->name(name: 'pengguna.create');
Route::post(uri: 'pengguna', action: [PenggunaController::class, 'store'])->name(name: 'pengguna.store');
Route::delete(uri: 'pengguna/{id}', action: [PenggunaController::class, 'destroy'])->name(name: 'pengguna.destroy');