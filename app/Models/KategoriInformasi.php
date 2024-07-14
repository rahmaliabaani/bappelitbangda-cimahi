<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriInformasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter(Builder $query) : void
    {
        // Pencarian: ketika inputan cari kosong maka pencarian berhenti, tapi jika ada inputan maka menjalankan perintah function yaitu ambil querynya dan ambil nilai input carinya
        
        $query->where('nama', 'like', '%' . request('cari') . '%');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'id_kategori_informasi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
