<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Informasi extends Model
{
    use HasFactory;

    // Atribut yang tidak bisa diisi manual
    protected $guarded = ['id'];

    // Untuk Konversi string publish_at menjadi objek carbon = mengubah format penulisan tanggalbulantahun jammenit
    protected $casts = ['publish_at' => 'datetime'];

    public function scopeFilter(Builder $query) : void
    {
        // Pencarian: ketika inputan cari kosong maka pencarian berhenti, tapi jika ada inputan maka menjalankan perintah function yaitu ambil querynya dan ambil nilai input carinya
        
        $query->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
                // ->join('kategori_informasis', 'informasis.id_kategori_informasi', '=', 'kategori_informasis.id')
                // ->orWhere('kategori_informasis.nama', 'like', '%' . request('cari') . '%');
    }

    // Relasi Tabel
    public function kategoriInformasi()
    {
        return $this->belongsTo(KategoriInformasi::class, 'id_kategori_informasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // untuk penggunaan slug di resources
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
