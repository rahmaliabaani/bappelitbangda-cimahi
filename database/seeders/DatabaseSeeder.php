<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Informasi;
use App\Models\KategoriInformasi;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Dokumen;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Dede Azis',
            'username' => 'dedeAzis',
            'email' => 'dedeAzis@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]); 
    }
}
