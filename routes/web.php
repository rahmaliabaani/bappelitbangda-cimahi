<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardGaleriController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardDokumenController;
use App\Http\Controllers\DashboardKateInfoController;
use App\Http\Controllers\DashboardInformasiController;
use App\Http\Controllers\DashboardKateBeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HalamanPengunjungController;

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

Route::get('/', [HalamanPengunjungController::class, 'indexBeranda']);

Route::get('/informasi', [HalamanPengunjungController::class, 'indexInformasi']);

Route::get('/informasi/{informasi:slug}', [HalamanPengunjungController::class, 'showInformasi']);

Route::get('/dokumen', [HalamanPengunjungController::class, 'indexDokumen']);

Route::get('/berita', [HalamanPengunjungController::class, 'indexBerita']);

Route::get('/berita/{berita:slug}', [HalamanPengunjungController::class, 'showBerita']);

Route::get('/profil', [HalamanPengunjungController::class, 'indexProfil']);

Route::get('/foto', [HalamanPengunjungController::class, 'indexFoto']);

Route::get('/vidio', [HalamanPengunjungController::class, 'indexVidio']);

// user yang blm terotentikasi = guest(tamu yg blm daftar)
// middleware = filtering request rute sebelum masuk ke controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('admin/staf/{user:id}/edit', [StafController::class, 'edit'])->middleware('admin')->name('staf.edit');

Route::put('admin/staf/{user:id}', [StafController::class, 'update'])->middleware('admin')->name('staf.update');

Route::resource('admin/staf', StafController::class)->except('show')->middleware('admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('staf');

Route::resource('/dashboard/informasi', DashboardInformasiController::class)->middleware('staf')->except('show');

Route::get('dashboard/berita/{berita:slug}/edit', [DashboardBeritaController::class, 'edit'])->middleware('staf')->name('berita.edit');

Route::put('dashboard/berita/{berita:slug}', [DashboardBeritaController::class, 'update'])->middleware('staf')->name('berita.update');

Route::resource('/dashboard/berita', DashboardBeritaController::class)->middleware('staf')->except('show');

Route::get('dashboard/dokumen/{dokumen:slug}/edit', [DashboardDokumenController::class, 'edit'])->middleware('staf')->name('dokumen.edit');

Route::put('dashboard/dokumen/{dokumen:slug}', [DashboardDokumenController::class, 'update'])->middleware('staf')->name('dokumen.update');

Route::resource('/dashboard/dokumen', DashboardDokumenController::class)->middleware('staf')->except('show');

Route::post('/dashboard/profil/updateStatus', [DashboardProfilController::class, 'updateStatus'])->middleware('staf')->name('profil.updateStatus');

Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('staf')->except('show');

Route::resource('/dashboard/galeri', DashboardGaleriController::class)->middleware('staf')->except('show');

Route::resource('/dashboard/kategori-informasi', DashboardKateInfoController::class)->middleware('staf')->except('show');

Route::put('/dashboard/kategori-berita/update/{slug}', [DashboardKateBeritaController::class, 'update'])->name('kategori-berita.update')->middleware('staf');

Route::resource('/dashboard/kategori-berita', DashboardKateBeritaController::class)->middleware('staf')->except('show');