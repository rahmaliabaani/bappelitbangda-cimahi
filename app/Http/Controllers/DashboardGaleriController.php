<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.galeri.index', [
            "title" => "Galeri",
            "galeri" => Galeri::latest()->filter()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dashboard.galeri.create', [
            "title" => "Galeri",
            "kategori" => ['Foto', 'Vidio'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:galeris',
            'kategori' => 'required',
            'gambar' => 'image|file|max:1024',
            'link_vidio' => 'url'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('galeri');
        }

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        $validatedData['publish_at'] = Carbon::now();

        Galeri::create($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Foto/Vidio baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri, Request $request)
    {
        return view('dashboard.galeri.update', [
            "title" => "Galeri",
            "kategori" => ['Foto', 'Vidio'],
            "galeris" => $galeri,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $rules = [
            'kategori' => 'required',
            'gambar' => 'image|file|max:1024',
            'link_vidio' => 'url'
        ];

        if ($request->nama != $galeri->nama) {
            $rules['nama'] = 'required|unique:galeris';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('galeri');
        }

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        Galeri::where('id', $galeri->id)
            ->update($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Foto/Vidio berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');

        if (count($ids) > 1) {
            foreach ($ids as $id) {
                $info = Galeri::findOrFail($id);

                // Hapus file gambar dari storage
                if (Storage::exists($info->gambar)) {
                    Storage::delete($info->gambar);
                }

                // Hapus data dari database
                $info->delete();
            }
        } else {
            $id = $ids[0];
            $info = Galeri::findOrFail($id);

            if (Storage::exists($info->gambar)) {
                Storage::delete($info->gambar);
            }

            // Hapus data dari database
            $info->delete();
        }
        return response()->json(['success' => true, 'message' => 'Foto/Vidio berhasil dihapus!']);
    }
}
