<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('rapat_id')->nullable();
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->time('waktu')->nullable();
            $table->foreignId('penulis_id')->constrained('anggota')->onDelete('cascade');
            $table->string('program_id')->nullable()->after('penulis_id');
            $table->foreign('program_id')->references('id')->on('program_kerja')->onDelete('set null');
            $table->string('file_path')->nullable();
            $table->timestamps();

            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notulen');
    }
};
