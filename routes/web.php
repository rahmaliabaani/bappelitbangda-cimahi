<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDokumenController;
use App\Http\Controllers\DashboardGaleriController;
use App\Http\Controllers\DashboardInformasiController;
use App\Http\Controllers\DashboardKateBeritaController;
use App\Http\Controllers\DashboardKateInfoController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StafController;
use App\Models\Galeri;
use App\Models\Profil;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('beranda', ["title" => "Beranda"]);
});

Route::get('/informasi', [InformasiController::class, 'index']);

Route::get('/informasi/{informasi:slug}', [InformasiController::class, 'show']);

Route::get('/dokumen', [DokumenController::class, 'index']);

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);

Route::get('/profil', function () {
    return view('profil', ["title" => "Profil"]);
});

Route::get('/foto', function () {
    return view('foto', ["title" => "Galeri"]);
});

Route::get('/vidio', function () {
    return view('vidio', ["title" => "Galeri"]);
});

// user yang blm terotentikasi = guest(tamu yg blm daftar)
// middleware = filtering request rute sebelum masuk ke controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('admin/staf/{user:id}/edit', [StafController::class, 'edit'])->middleware('auth')->name('staf.edit');

Route::put('admin/staf/{user:id}', [StafController::class, 'update'])->middleware('auth')->name('staf.update');

Route::resource('admin/staf', StafController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/informasi', DashboardInformasiController::class)->middleware('auth');

Route::get('dashboard/berita/{berita:slug}/edit', [DashboardBeritaController::class, 'edit'])->middleware('auth')->name('berita.edit');

Route::put('dashboard/berita/{berita:slug}', [DashboardBeritaController::class, 'update'])->middleware('auth')->name('berita.update');

Route::resource('/dashboard/berita', DashboardBeritaController::class)->middleware('auth');

Route::get('dashboard/dokumen/{dokumen:slug}/edit', [DashboardDokumenController::class, 'edit'])->middleware('auth')->name('dokumen.edit');

Route::put('dashboard/dokumen/{dokumen:slug}', [DashboardDokumenController::class, 'update'])->middleware('auth')->name('dokumen.update');

Route::resource('/dashboard/dokumen', DashboardDokumenController::class)->middleware('auth');

Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('auth');

Route::resource('/dashboard/galeri', DashboardGaleriController::class)->middleware('auth');

Route::resource('/dashboard/kategori-informasi', DashboardKateInfoController::class)->middleware('auth');

Route::resource('/dashboard/kategori-berita', DashboardKateBeritaController::class)->middleware('auth');
