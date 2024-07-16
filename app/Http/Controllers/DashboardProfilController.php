<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Official;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profil.index', [
            "title" => "Profil",
            "profil" => Profil::all(),
            "official" => Official::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.profil.create', [
            "title" => "Profil",
            "official" => Official::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'periode' => 'required|max:255|unique:profils',
            'gambar_struktur' => 'required|image|file|max:1024',
            'fungsi' => 'required',
            'sejarah' => 'required',
            'tugas' => 'required',
            'tujuan' => 'required',
            'sasaran' => 'required',
            'nama_kepala_badan' => 'required',
            'foto_kepala_badan' => 'required|image|file|max:1024',
            'nama_kepalabidang_p3e' => 'required',
            'foto_kepalabidang_p3e' => 'required|image|file|max:1024',
            'nama_kepalabidang_p3m' => 'required',
            'foto_kepalabidang_p3m' => 'required|image|file|max:1024',
            'nama_kepalabidang_pp' => 'required',
            'foto_kepalabidang_pp' => 'required|image|file|max:1024',
            'nama_kepalabidang_pesd' => 'required',
            'foto_kepalabidang_pesd' => 'required|image|file|max:1024',
            'nama_kepalabidang_pik' => 'required',
            'foto_kepalabidang_pik' => 'required|image|file|max:1024'
        ]);
    
        // Menyimpan file gambar struktur
        if ($request->file('gambar_struktur')) {
            $validatedData['gambar_struktur'] = $request->file('gambar_struktur')->store('gambar-profil');
        }
    
        // Menyimpan file foto pejabat
        $officialFiles = [
            'foto_kepala_badan',
            'foto_kepalabidang_p3e',
            'foto_kepalabidang_p3m',
            'foto_kepalabidang_pp',
            'foto_kepalabidang_pesd',
            'foto_kepalabidang_pik'
        ];
    
        foreach ($officialFiles as $file) {
            if ($request->file($file)) {
                $validatedData[$file] = $request->file($file)->store('gambar-official');
            }
        }
    
        // Menambahkan id_officials dan id_user serta publish_at
        $validatedData['id_officials'] = Str::slug($request->periode);
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['publish_at'] = Carbon::now();
    
        // Memisahkan data Profil dan Official
        $profilData = array_intersect_key($validatedData, array_flip([
            'periode', 'gambar_struktur', 'fungsi', 'sejarah', 'tugas', 'tujuan', 'sasaran', 'id_officials', 'id_user', 'publish_at'
        ]));
        $officialData = array_intersect_key($validatedData, array_flip([
            'nama_kepala_badan', 'foto_kepala_badan', 'nama_kepalabidang_p3e', 'foto_kepalabidang_p3e', 'nama_kepalabidang_p3m', 'foto_kepalabidang_p3m',
            'nama_kepalabidang_pp', 'foto_kepalabidang_pp', 'nama_kepalabidang_pesd', 'foto_kepalabidang_pesd', 'nama_kepalabidang_pik', 'foto_kepalabidang_pik'
        ]));
    
        // Menyimpan data ke database
        Profil::create($profilData);
        Official::create($officialData);
    
        return redirect('/dashboard/profil')->with('success', 'Profil baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
