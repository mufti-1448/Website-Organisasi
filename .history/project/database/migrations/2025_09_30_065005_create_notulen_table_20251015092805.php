<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->id();
            $table->string('rapat_id')->unique()->nullable();
            $table->text('isi')->nullable();
            $table->date('tanggal');
            $table->foreignId('penulis_id')->constrained('anggota')->onDelete('cascade');

            // karena program_kerja.id adalah string, kita tidak pakai foreignId()
            $table->string('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('program_kerja')->onDelete('cascade');

            // file notulen
            $table->string('file_path')->nullable();

            $table->timestamps();

            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notulen');
    }
};
