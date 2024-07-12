<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInformasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'id_kategori_informasi', 'id');
    }
}
