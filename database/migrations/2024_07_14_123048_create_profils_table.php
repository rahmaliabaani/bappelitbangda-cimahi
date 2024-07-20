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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_officials');
            $table->foreignId('id_user');
            $table->boolean('is_active')->default(false);
            $table->year('periode')->unique();
            $table->text('tujuan');
            $table->text('sasaran');
            $table->text('tugas');
            $table->text('fungsi');
            $table->text('sejarah');
            $table->string('gambar_struktur');
            $table->timestamp('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
            // $table->dropColumn('is_active');
        // });
    }
};
