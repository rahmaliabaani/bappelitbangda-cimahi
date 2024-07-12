<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('berita', [
            "title" => "Berita",
            "berita" => Berita::filter()->latest('beritas.created_at')->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('detail-berita', [
            "title" => "Berita",
            "berita" => $berita
        ]);
    }

}
