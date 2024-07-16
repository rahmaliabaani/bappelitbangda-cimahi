<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeFilter(Builder $query) : void
    {
        // Pencarian: ketika inputan cari kosong maka pencarian berhenti, tapi jika ada inputan maka menjalankan perintah function yaitu ambil querynya dan ambil nilai input carinya
        
        $query->where('name', 'like', '%' . request('cari') . '%');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'id_user', 'id');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_user', 'id');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_user', 'id');
    }

    public function kategoriInformasi()
    {
        return $this->hasMany(kategoriInformasi::class, 'id_user', 'id');
    }

    public function kategoriBerita()
    {
        return $this->hasMany(kategoriBerita::class, 'id_user', 'id');
    }

    public function profil()
    {
        return $this->hasMany(Profil::class, 'id_user', 'id');
    }
}
