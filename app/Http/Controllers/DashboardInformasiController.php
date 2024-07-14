<?php

namespace App\Http\Controllers;

use console;
use Carbon\Carbon;
use App\Models\Informasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriInformasi;
use Illuminate\Support\Facades\Storage;

class DashboardInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.informasi.index', [
            "title" => "Informasi",
            "informasi" => Informasi::latest()->where('id_user', auth()->user()->id)->filter()->paginate(5)->withQueryString(),
            // "info" => Informasi::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.informasi.create', [
            "title" => "Informasi",
            "kategoris" => KategoriInformasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|unique:informasis',
            'id_kategori_informasi' => 'required',
            'gambar' => 'image|file|max:1024',
            'deskripsi' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-info');
        }

        $validatedData['slug'] = Str::slug($request->judul);

        $validatedData['id_user'] = auth()->user()->id;

        $validatedData['publish_at'] = Carbon::now();

        Informasi::create($validatedData);

        return redirect('/dashboard/informasi')->with('success', 'Informasi baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('dashboard.informasi.update', [
            "title" => "Informasi",
            "informasi" => $informasi,
            "kategoris" => KategoriInformasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        $rules = [
            'id_kategori_informasi' => 'required',
            'gambar' => 'image|file|max:1024',
            'deskripsi' => 'required'
        ];

        if ($request->judul != $informasi->judul) {
            $rules['judul'] = 'required|unique:informasis';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-info');
        }

        $validatedData['slug'] = Str::slug($request->judul);

        $validatedData['id_user'] = auth()->user()->id;

        Informasi::where('id', $informasi->id)
            ->update($validatedData);

        return redirect('/dashboard/informasi')->with('success', 'Informasi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');

        if (count($ids) > 1) {
            foreach ($ids as $id) {
                $info = Informasi::findOrFail($id);

                // Hapus file gambar dari storage
                if (Storage::exists($info->gambar)) {
                    Storage::delete($info->gambar);
                }

                // Hapus data dari database
                $info->delete();
            }
        } else {
            $id = $ids[0];
            $info = Informasi::findOrFail($id);

            // Hapus file gambar dari storage
            if (Storage::exists($info->gambar)) {
                Storage::delete($info->gambar);
            }

            // Hapus data dari database
            $info->delete();
        }
        // return redirect()->route('/dashboard/informasi')->with('success', 'Informasi berhasil dihapus!');
        return response()->json(["success" => "Informasi berhasil dihapus!"]);
    }
}
