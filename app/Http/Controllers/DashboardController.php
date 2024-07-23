<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Informasi;
use App\Models\KategoriBerita;
use App\Models\KategoriInformasi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard",
            "totalInformasi" => Informasi::count(),
            "kategoriI" => KategoriInformasi::withCount('informasi')->get(),
            "totalBerita" => Berita::count(),
            "kategoriB" => KategoriBerita::withCount('berita')->get(),
            "totalDokA" => Dokumen::where('kategori', 'Arsip Paparan')->get()->count(),
            "totalDokP" => Dokumen::where('kategori', 'Dokumen Perencanaan')->get()->count()
        ]);
    }
}
