<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda', [
            "title" => "Beranda", 
            "informasi" => Informasi::latest()->take(6)->get()
        ]);
    }
}
