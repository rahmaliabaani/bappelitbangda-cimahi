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
        // $request->validate([
        //     'kategori' => 'required',
        //     'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        // ]);

        // $document = Dokumen::findOrFail($dokumen->slug);
        // $document->nama = $request->input('nama');
        // $document['slug'] = Str::slug($request->nama);
        // $document['id_user'] = auth()->user()->id;

        // if ($request->hasFile('dokumen')) {
        //     $file = $request->file('dokumen');
        //     $path = $file->store('dokumen', 'public');
        //     $document->file_path = $path;
        // }

        // $document->save();

        // return redirect('/dashboard/dokumen')->with('success', 'Dokumen berhasil diedit!');

        // $this->validate($request, [
        //     'kategori' => 'required',
        //     'dokumen' => 'required|mimes:docx,pdf|max:2048'
        // ]);

        // if ($request->hasFile('dokumen')) {
        //     $file = $request->file('dokumen');
        //     $file->storeAs('storage/dokumen', $file->hashName());

        //     Storage::delete('storage/dokumen' . $dokumen->dokumen);

        //     $dokumen->update([
        //         'dokumen' => $file->hashName(),
        //         'nama' => $request->nama,
        //         'slug' => Str::slug($request->nama),
        //         'kategori' => $request->kategori,
        //         'id_user' => auth()->user()->id
        //     ]);
        // } else {
        //     $dokumen->update([
        //         'nama' => $request->nama,
        //         'slug' => Str::slug($request->nama),
        //         'kategori' => $request->kategori,
        //         'id_user' => auth()->user()->id
        //     ]);
        // }

        // return redirect()->route('dokumen.index')->with(['success' => 'Dokumen Berhasil diubah!']);

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
                Storage::delete('storage/dokumen' . $dokumen->dokumen);
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

        if (count($ids) > 1) {
            foreach ($ids as $id) {
                $dok = Dokumen::findOrFail($id);

                // Hapus file dari storage
                if (Storage::exists($dok->dokumen)) {
                    Storage::delete($dok->dokumen);
                }

                // Hapus data dari database
                $dok->delete();
            }
        } else {
            $id = $ids[0];
            $dok = Dokumen::findOrFail($id);

            // Hapus file gambar dari storage
            if (Storage::exists($dok->dokumen)) {
                Storage::delete($dok->dokumen);
            }

            // Hapus data dari database
            $dok->delete();
        }
        // return redirect()->route('/dashboard/dokumen')->with('success', 'Dokumen berhasil dihapus!');
        return response()->json(["success" => "Dokumen berhasil dihapus!"]);
    }
}
