<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('informasi', [
            "title" => "Informasi",
            "informasi" => Informasi::latest('informasis.created_at')->filter()->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        return view('detail-informasi', [
            "title" => "Informasi",
            "informasi" => $informasi
        ]);
    }
}
