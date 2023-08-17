<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;


Route::get('/',[SiteController::class,'index'])->name('home.index'); //Route ketika tombol non aktif di tekan

Route::get('/dashboard',[SiteController::class,'dashboard'])->name('dashboard.index'); //Route ketika tombol non aktif di tekan

Route::get('/users',[UserController::class,'index'])->name('users.index'); //Route ketika tombol non aktif di tekan
Route::post('/users/store',[UserController::class,'tambah'])->name('users.add'); //Route ketika tombol non aktif di tekan
Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete'); //Route ketika tombol non aktif di tekan
Route::post('/users/updatedata/{id}',[UserController::class,'update'])->name('users.edit'); //ROute untuk mengubah data user

Route::get('/layanans',[LayananController::class,'index'])->name('layanans.index'); //Route ketika tombol non aktif di tekan
Route::post('/layanans/store',[LayananController::class,'tambah'])->name('layanans.add'); //Route ketika tombol non aktif di tekan
Route::get('/layanans/delete/{id}',[LayananController::class,'delete'])->name('layanans.delete'); //Route ketika tombol non aktif di tekan
Route::post('/layanans/updatedata/{id}',[LayananController::class,'update'])->name('layanans.edit'); //ROute untuk mengubah data user

Route::get('/obats',[ObatController::class,'index'])->name('obats.index'); //Route ketika tombol non aktif di tekan
Route::post('/obats/store',[ObatController::class,'tambah'])->name('obats.add'); //Route ketika tombol non aktif di tekan
Route::get('/obats/delete/{id}',[ObatController::class,'delete'])->name('obats.delete'); //Route ketika tombol non aktif di tekan
Route::post('/obats/updatedata/{id}',[ObatController::class,'update'])->name('obats.edit'); //ROute untuk mengubah data user

Route::get('/pasiens',[PasienController::class,'index'])->name('pasiens.index'); //Route ketika tombol non aktif di tekan
Route::post('/pasiens/store',[PasienController::class,'tambah'])->name('pasiens.add'); //Route ketika tombol non aktif di tekan
Route::get('/pasiens/delete/{id}',[PasienController::class,'delete'])->name('pasiens.delete'); //Route ketika tombol non aktif di tekan
Route::post('/pasiens/updatedata',[PasienController::class,'update'])->name('pasiens.edit'); //ROute untuk mengubah data user

Route::get('/antrians',[AntrianController::class,'index'])->name('antrians.index'); //Route ketika tombol non aktif di tekan
Route::post('/antrians/set',[AntrianController::class,'set'])->name('antrians.set'); //Route ketika tombol non aktif di tekan
Route::post('/antrians/ambil',[AntrianController::class,'ambil'])->name('antrians.ambil'); //Route ketika tombol non aktif di tekan

Route::get('/pemeriksaans',[PemeriksaanController::class,'index'])->name('pemeriksaans.index'); //Route ketika tombol non aktif di tekan
Route::get('/pemeriksaans/done/{id}',[PemeriksaanController::class,'done'])->name('pemeriksaans.done'); //Route ketika tombol non aktif di tekan
Route::post('/pemeriksaans/store',[PemeriksaanController::class,'store'])->name('pemeriksaans.add'); //Route ketika tombol non aktif di tekan
Route::get('/pemeriksaans/delete/{id}',[PemeriksaanController::class,'delete'])->name('pemeriksaans.delete'); //Route ketika tombol non aktif di tekan
Route::post('/pemeriksaans/updatedata/{id}',[PemeriksaanController::class,'update'])->name('pemeriksaans.edit'); //ROute untuk mengubah data user
Route::post('/pemeriksaans/detail/store',[PemeriksaanController::class,'detail'])->name('pemeriksaans.detail'); //Route ketika tombol non aktif di tekan

Route::post('/login',[SiteController::class,'login'])->name('login'); //Route ketika tombol non aktif di tekan
Route::get('/logout',[SiteController::class,'logout'])->name('logout'); //Route ketika tombol non aktif di tekan

Route::get('/download/kartu_pasien', [SiteController::class, 'createKartu']);
Route::get('/download/pemeriksaan_rekap', [SiteController::class, 'createRekap']);

Route::get('/jadwals',[AntrianController::class,'indexJadwal'])->name('jadwals.index'); //Route ketika tombol non aktif di tekan
Route::post('/jadwals/store',[AntrianController::class,'tambahJadwal'])->name('jadwals.add'); //Route ketika tombol non aktif di tekan
Route::get('/jadwals/delete/{id}',[AntrianController::class,'deleteJadwal'])->name('jadwals.delete'); //Route ketika tombol non aktif di tekan
Route::post('/jadwals/updatedata/{id}',[AntrianController::class,'updateJadwal'])->name('jadwals.edit'); //ROute untuk mengubah data user