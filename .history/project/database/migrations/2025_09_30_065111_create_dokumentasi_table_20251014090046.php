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
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('kategori')->nullable();

            // Foreign keys
            $table->foreignId('rapat_id')
                ->constrained('rapat')
                ->onDelete('cascade');

            $table->foreignId('program_id')
                ->nullable()
                ->constrained('program_kerja')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
