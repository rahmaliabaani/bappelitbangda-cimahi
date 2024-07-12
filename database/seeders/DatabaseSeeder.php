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
            'name' => 'Rahmalia Nuursyabaani',
            'username' => 'rahmalia',
            'email' => 'rahma@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]); 

        User::factory()->create([
            'name' => 'Sittanisa',
            'username' => 'sitta',
            'email' => 'sitta@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 0
        ]); 
        
        KategoriInformasi::create([
            'nama' => 'Kebijakan',
            'slug' => 'kebijakan'
        ]);

        KategoriInformasi::create([
            'nama' => 'Lingkungan',
            'slug' => 'lingkungan'
        ]);

        KategoriInformasi::create([
            'nama' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        Informasi::create([
                'judul' => 'Judul Kesatu',
                'slug' => 'judul-kesatu',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
                'publish_at' => Carbon::now(),
                'id_kategori_informasi' => 2,
                'id_user' => 1
        ]);

        Informasi::create([
            'judul' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!
            
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
            'publish_at' => Carbon::now(),
            'id_kategori_informasi' => 1,
            'id_user' => 1
        ]); 
        
        Informasi::create([
            'judul' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
            'publish_at' => Carbon::now(),
            'id_kategori_informasi' => 2,
            'id_user' => 2
        ]);

        KategoriBerita::create([
            'nama' => 'Kebijakan',
            'slug' => 'kebijakan'
        ]);

        KategoriBerita::create([
            'nama' => 'Lingkungan',
            'slug' => 'lingkungan'
        ]);

        KategoriBerita::create([
            'nama' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        Berita::create([
            'judul' => 'Judul Kesatu',
            'slug' => 'judul-kesatu',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
            'publish_at' => Carbon::now(),
            'id_kategori_berita' => 2,
            'id_user' => 1
        ]);

        Berita::create([
            'judul' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
            'publish_at' => Carbon::now(),
            'id_kategori_berita' => 3,
            'id_user' => 1
        ]);

        Berita::create([
            'judul' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!
            
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quia sint nulla iusto laudantium, delectus excepturi minus obcaecati necessitatibus dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatum cupiditate inventore iure ea pariatur similique animi optio possimus repudiandae, eius, aut iusto ipsa. Porro temporibus consequatur a ipsum commodi ab dolorum. Modi, incidunt temporibus earum error tempora fugit, mollitia voluptates odio nemo ad at vel dolorem inventore perspiciatis ullam!',
            'publish_at' => Carbon::now(),
            'id_kategori_berita' => 2,
            'id_user' => 2
        ]);

        Dokumen::create([
            'nama' => 'Judul Kesatu',
            'kategori' => 'Arsip Paparan',
            'slug' => 'judul-kesatu',
            'dokumen' => 'Lorem ipsum dolor sit amet consectetur',
            'publish_at' => Carbon::now(),
            'id_user' => 2
        ]);

        Dokumen::create([
            'nama' => 'Judul Kedua',
            'kategori' => 'Dokumen Perencanaan',
            'slug' => 'judul-kedua',
            'dokumen' => 'Lorem ipsum dolor sit amet consectetur',
            'publish_at' => Carbon::now(),
            'id_user' => 1
        ]);

        Dokumen::create([
            'nama' => 'Judul Ketiga',
            'kategori' => 'Dokumen Perencanaan',
            'slug' => 'judul-ketiga',
            'dokumen' => 'Lorem ipsum dolor sit amet consectetur',
            'publish_at' => Carbon::now(),
            'id_user' => 1
        ]);
    }
}
