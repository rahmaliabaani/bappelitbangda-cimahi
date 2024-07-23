<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil', [
            "title" => "Profil", 
            "profils" => Profil::where('is_active', true)->get(),
        ]);
    }
}
