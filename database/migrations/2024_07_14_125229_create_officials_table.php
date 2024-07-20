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
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_badan');
            $table->string('foto_kepala_badan')->nullable();
            $table->string('nama_kepalabidang_p3e');
            $table->string('foto_kepalabidang_p3e')->nullable();
            $table->string('nama_kepalabidang_p3m');
            $table->string('foto_kepalabidang_p3m')->nullable();
            $table->string('nama_kepalabidang_pp');
            $table->string('foto_kepalabidang_pp')->nullable();
            $table->string('nama_kepalabidang_pesd');
            $table->string('foto_kepalabidang_pesd')->nullable();
            $table->string('nama_kepalabidang_pik');
            $table->string('foto_kepalabidang_pik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials');
    }
};
