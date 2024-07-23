<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.berita.index', [
            "title" => "Berita",
            "berita" => Berita::latest()->where('id_user', auth()->user()->id)->filter()->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berita.create', [
            "title" => "Berita",
            "kategoris" => KategoriBerita::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|unique:beritas',
            'id_kategori_berita' => 'required',
            'gambar' => 'image|file|max:1024',
            'deskripsi' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }

        $validatedData['slug'] = Str::slug($request->judul);

        $validatedData['id_user'] = auth()->user()->id;

        $validatedData['publish_at'] = Carbon::now();

        Berita::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('dashboard.berita.update', [
            "title" => "Berita",
            "berita" => $berita,
            "kategoris" => KategoriBerita::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $rules = [
            'id_kategori_berita' => 'required',
            'gambar' => 'image|file|max:1024',
            'deskripsi' => 'required'
        ];

        if ($request->judul != $berita->judul) {
            $rules['judul'] = 'required|unique:beritas';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }

        $validatedData['slug'] = Str::slug($request->judul);

        $validatedData['id_user'] = auth()->user()->id;

        Berita::where('id', $berita->id)
            ->update($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita berhasil diedit!');
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
                $item = Berita::find($id);

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
        return response()->json(['success' => true, 'message' => 'Berita berhasil dihapus!']);
    }
}
