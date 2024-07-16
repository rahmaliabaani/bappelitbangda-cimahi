<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['publish_at' => 'datetime'];

    public function scopeFilter(Builder $query) : void
    {
        // Pencarian: ketika inputan cari kosong maka pencarian berhenti, tapi jika ada inputan maka menjalankan perintah function yaitu ambil querynya dan ambil nilai input carinya
        $query->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function official()
    {
        return $this->hasOne(Official::class, 'id');
    }

}
