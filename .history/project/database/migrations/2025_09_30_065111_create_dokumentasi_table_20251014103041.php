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

        // Tambahan kolom relasi
        $table->string('rapat_id')->nullable();
        $table->unsignedBigInteger('program_id')->nullable();

        // Foreign key
        $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('set null');
        $table->foreign('program_id')->references('id')->on('program_kerja')->onDelete('set null');

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
