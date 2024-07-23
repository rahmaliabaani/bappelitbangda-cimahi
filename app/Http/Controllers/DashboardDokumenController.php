<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dokumen.index', [
            "title" => "Dokumen",
            "dokumen" => Dokumen::latest()->where('id_user', auth()->user()->id)->filter()->paginate(5)
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dokumen.create', [
            "title" => "Dokumen",
            "kategori" => Dokumen::$kategoriD
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:dokumens',
            'kategori' => 'required',
            'dokumen' => 'required|mimes:docx,pdf|max:2048'
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        $validatedData['publish_at'] = Carbon::now();

        Dokumen::create($validatedData);

        return redirect('/dashboard/dokumen')->with('success', 'Dokumen baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        return view('dashboard.dokumen.update', [
            "title" => "Dokumen",
            "dokumen" => $dokumen,
            "kategori" => Dokumen::$kategoriD
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $rules = [
            'kategori' => 'required',
            'dokumen' => 'mimes:docx,pdf|max:2048'
        ];

        if ($request->nama != $dokumen->nama) {
            $rules['nama'] = 'required|unique:dokumens';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {

            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        $validatedData['slug'] = Str::slug($request->nama);

        $validatedData['id_user'] = auth()->user()->id;

        Dokumen::where('id', $dokumen->id)
            ->update($validatedData);

        return redirect('/dashboard/dokumen')->with('success', 'Dokumen berhasil diedit!');
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
                $item = Dokumen::find($id);

                if ($item) {
                    // Hapus file gambar jika ada
                    if ($item->dokumen && Storage::disk('public')->exists($item->dokumen)) {
                        Storage::disk('public')->delete($item->dokumen);
                    }

                    // Hapus item dari database
                    $item->delete();
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Dokumen berhasil dihapus!']);
    }
}
