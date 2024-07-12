<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokumen', [
            "title" => "Dokumen",
            // Ambil semua dokumen dengan kategori
            "dokumen1" => Dokumen::where('kategori', 'Arsip Paparan')->get(),
            "dokumen2" => Dokumen::where('kategori', 'Dokumen Perencanaan')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
