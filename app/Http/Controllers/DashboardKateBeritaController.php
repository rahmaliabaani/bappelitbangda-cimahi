<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class DashboardKateBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori-berita.index', [
            "title" => "KategoriBerita",
            "katberita" => KategoriBerita::latest()->filter()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50|unique:kategori_beritas',
        ]);

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        KategoriBerita::create($validatedData);

        return redirect('/dashboard/kategori-berita')->with('success', 'Kategori Berita baru berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        if ($request->nama != $kategoriBerita->nama) {
            $rules['nama'] = 'required|unique:kategori_beritas';
        }
        
        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;
        
        KategoriBerita::where('id', $kategoriBerita->id)
        ->update($validatedData);

        // return $request;
        return redirect('/dashboard/kategori-berita')->with('success', 'Kategori Berita berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        KategoriBerita::whereIn('id',$request->ids)->delete();
        // KategoriInformasi::destroy('id',$kategoriInformasi->ids);
        return response()->json(["success" => "Kategori Berita berhasil dihapus!"]);
    }
}
