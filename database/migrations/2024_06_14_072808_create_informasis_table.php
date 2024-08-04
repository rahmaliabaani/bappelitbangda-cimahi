<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users', indexName: 'id_user_info')->onDelete('restrict');
            $table->foreignId('id_kategori_informasi')->constrained(table: 'kategori_informasis', indexName: 'id_kate_info')->onDelete('restrict');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->text('deskripsi');
            $table->timestamp('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasis');
    }
};
