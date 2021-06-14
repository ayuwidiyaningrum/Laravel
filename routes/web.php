<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

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
   // return view('welcome');
   return view('layouts.beranda');
});

Route::get('/beranda', function () {
    return view('layouts.beranda');
 });

 Route::get('/about', function () {
    return view('layouts.about');
 });

Route::get('/kabar', function () {
    return view('kondisi');
});

Route::get('/daftarnilai', function () {
    return view('daftar_nilai');
});

Route::get('/nilai', function () {
    return view('nilai');
});
Route::get('/salam', function () {
    return "Asslammu'alaikum Sobat, Selamat Belajar Laravel";
});

Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
});

Route::resource('/pengarang', PengarangController::class);
Route::resource('/buku',BukuController::class);
Route::resource('/anggota',AnggotaController::class);
// Route::resource('/penerbit','PenerbitController');
// Route::resource('/kategori','KategoriController');
// Route::resource('/peminjaman', 'PeminjamanController');


