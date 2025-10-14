<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

rreturn new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->string('id')->primary(); // ID custom seperti PRK001
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->foreignId('penanggung_jawab_id')->constrained('anggota')->onDelete('cascade');
            $table->enum('status', ['belum', 'berlangsung', 'selesai'])->default('belum');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_kerja');
    }
};
