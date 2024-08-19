<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Informasi;
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
            "informasi" => Informasi::latest()->where('id_user', auth()->user()->id)->filter()->paginate(10)->withQueryString(),

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
            'gambar' => 'image|file|max:5120',
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
            'gambar' => 'image|file|max:5120',
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
        if ($ids) {
            foreach ($ids as $id) {
                // Temukan item berdasarkan ID
                $item = Informasi::find($id);

                if ($item) {
                    // Hapus file gambar jika ada
                    if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
                        Storage::disk('public')->delete($item->gambar);
                    }

                    // Hapus item dari database
                    $item->delete();
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Informasi berhasil dihapus!']);
    }
}
