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
        Schema::create('rapat', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('tempat');
            $table->integer('jumlah_peserta')->nullable(); // 👈 Tambahkan ini
            $table->enum('keterangan', ['Belum Dimulai', 'Sedang Berlangsung', 'Selesai'])->default('Belum Dimulai'); // 👈 ubah ke enum agar pilihan tetap konsisten
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapat');
    }
};
