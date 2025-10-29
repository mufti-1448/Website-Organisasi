<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel rapat
     */
    public function up(): void
    {
        Schema::create('rapat', function (Blueprint $table) {
            $table->string('id')->primary(); // ID custom, misalnya RPT001
            $table->string('judul');
            $table->string('nama')->nullable(); // Tambahkan kolom nama
            $table->date('tanggal');
            $table->time('waktu')->nullable();
            $table->string('tempat');
            $table->enum('status', ['belum', 'berlangsung', 'selesai'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Hapus tabel rapat (rollback)
     */
    public function down(): void
    {
        Schema::dropIfExists('rapat');
    }
};
