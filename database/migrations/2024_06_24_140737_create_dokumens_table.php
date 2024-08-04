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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users', indexName: 'id_user_dok')->onDelete('restrict');
            $table->string('nama');
            $table->enum('kategori', ['Arsip Paparan', 'Dokumen Perencanaan']);
            $table->string('slug')->unique();
            $table->string('dokumen');
            $table->timestamp('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
