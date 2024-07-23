<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        return view('vidio', [
            "title" => "Galeri", 
            "galeriVidio" => Galeri::latest()->where('kategori', 'Vidio')->filter()->paginate(10),
            "galeriFoto" => Galeri::latest()->where('kategori', 'Foto')->filter()->paginate(10)
        ]);
    }
}
