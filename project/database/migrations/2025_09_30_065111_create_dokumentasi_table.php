<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('rapat_id')->nullable()->after('id');
            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('set null');
            $table->string('program_id')->nullable()->after('rapat_id');
            $table->foreign('program_id')->references('id')->on('program_kerja')->onDelete('set null');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('kategori')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
