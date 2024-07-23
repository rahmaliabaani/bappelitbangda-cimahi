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

Route::get('/', [BerandaController::class, 'index']);

Route::get('/informasi', [InformasiController::class, 'index']);

Route::get('/informasi/{informasi:slug}', [InformasiController::class, 'show']);

Route::get('/dokumen', [DokumenController::class, 'index']);

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);

Route::get('/profil', [ProfilController::class, 'index']);

Route::get('/foto', [GaleriController::class, 'index']);

Route::get('/vidio', [GaleriController::class, 'index']);

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