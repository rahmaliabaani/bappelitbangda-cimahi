<?php

namespace App\Http\Controllers;

use console;
use Carbon\Carbon;
use App\Models\Informasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriInformasi;
use Illuminate\Support\Facades\DB;

class DashboardInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.informasi.index', [
            "title" => "Informasi",
            "informasi" => Informasi::where('id_user', auth()->user()->id)->filter()->paginate(5)->withQueryString(),
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
            'deskripsi' => 'required'
        ]);

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
            'deskripsi' => 'required'
        ];

        if ($request->judul != $informasi->judul) {
            $rules['judul'] = 'required|unique:informasis';
        }

        $validatedData = $request->validate($rules);

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
        $ids = $request->ids;
        Informasi::whereIn('id',$ids)->delete();
        return response()->json(["success" => "Informasi berhasil dihapus!"]);
    }
}
