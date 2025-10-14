<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->string('rapat_id'); // FK ke rapat
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->date('tanggal');
            $table->string('kategori')->nullable();
            $table->timestamps();

            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('cascade');
            $table->foreignId('program_id')
                ->nullable()
                ->constrained('program_kerja')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
