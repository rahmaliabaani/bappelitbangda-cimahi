<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Profil;
use App\Models\Dokumen;
use App\Models\Informasi;
use Illuminate\Http\Request;

class HalamanPengunjungController extends Controller
{
    // Halaman Beranda
    public function indexBeranda()
    {
        return view('beranda', [
            "title" => "Beranda", 
            "informasi" => Informasi::latest()->take(8)->get()
        ]);
    }

    // Halaman Berita
    public function indexBerita()
    {
        return view('berita', [
            "title" => "Berita",
            "berita" => Berita::filter()->latest('beritas.created_at')->paginate(12)->withQueryString()
        ]);
    }

    public function showBerita(Berita $berita)
    {
        return view('detail-berita', [
            "title" => "Berita",
            "berita" => $berita
        ]);
    }

    // Halaman Informasi
    public function indexInformasi()
    {
        return view('informasi', [
            "title" => "Informasi",
            "informasi" => Informasi::latest('informasis.created_at')->filter()->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showInformasi(Informasi $informasi)
    {
        return view('detail-informasi', [
            "title" => "Informasi",
            "informasi" => $informasi
        ]);
    }

    // Halaman Dokumen
    public function indexDokumen()
    {
        return view('dokumen', [
            "title" => "Dokumen",
            // Ambil semua dokumen dengan kategori
            "dokumen1" => Dokumen::where('kategori', 'Arsip Paparan')->paginate(5)->withQueryString(),
            "dokumen2" => Dokumen::where('kategori', 'Dokumen Perencanaan')->paginate(5)->withQueryString()
        ]);
    }

    // Halaman Profil
    public function indexProfil()
    {
        return view('profil', [
            "title" => "Profil", 
            "profils" => Profil::where('is_active', true)->get(),
        ]);
    }

    // Halaman Galeri
    public function indexVidio()
    {
        return view('vidio', [
            "title" => "Galeri", 
            "galeriVidio" => Galeri::latest()->where('kategori', 'Vidio')->filter()->paginate(8),
        ]);
    }

    public function indexFoto()
    {
        return view('foto', [
            "title" => "Galeri", 
            "galeriFoto" => Galeri::latest()->where('kategori', 'Foto')->filter()->paginate(8)
        ]);
    }
}
