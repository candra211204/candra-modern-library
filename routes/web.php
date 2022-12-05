<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Halaman tabel kategori
    Route::resource('kategori', KategoriController::class)->middleware('admin');

    // Aksi hapus kategori
    Route::get('hapusKategori/{id}', [KategoriController::class, 'destroy'])->middleware('admin');

    // Halaman tabel buku
    Route::resource('buku', BukuController::class);

    // Aksi hapus buku
    Route::get('hapusBuku/{id}', [BukuController::class, 'destroy']);

    // Halaman beranda
    Route::resource('beranda',BerandaController::class);
});