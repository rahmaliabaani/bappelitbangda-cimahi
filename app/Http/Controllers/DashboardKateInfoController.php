<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KategoriInformasi;

class DashboardKateInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori-informasi.index', [
            "title" => "KategoriInformasi",
            "katinformasi" => KategoriInformasi::latest()->filter()->paginate(5)->withQueryString(),
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
            'nama' => 'required|max:50|unique:kategori_informasis',
        ]);

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        KategoriInformasi::create($validatedData);

        return redirect('/dashboard/kategori-informasi')->with('success', 'Kategori Informasi baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriInformasi $kategoriInformasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriInformasi $kategoriInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriInformasi $kategoriInformasi)
    {
        if ($request->nama != $kategoriInformasi->nama) {
            $rules['nama'] = 'required|unique:kategori_informasis';
        }

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        KategoriInformasi::where('id', $kategoriInformasi->id)
        ->update($validatedData);

        return redirect('/dashboard/kategori-informasi')->with('success', 'Kategori Informasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        KategoriInformasi::whereIn('id',$request->ids)->delete();
        // KategoriInformasi::destroy('id',$kategoriInformasi->ids);
        return response()->json(["success" => "Kategori Informasi berhasil dihapus!"]);
    }
}
