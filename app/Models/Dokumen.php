<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    // Atribut yang tidak bisa diisi manual
    protected $guarded = ['id'];

    // Untuk Konversi string publish_at menjadi objek carbon = mengubah format penulisan tanggalbulantahun jammenit
    protected $casts = ['publish_at' => 'datetime',];

    // Relasi Tabel
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
