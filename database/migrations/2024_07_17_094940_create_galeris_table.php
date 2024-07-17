<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->string('nama');
            $table->enum('kategori', ['Foto', 'Vidio']);
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->string('link_vidio')->nullable();
            $table->timestamp('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
