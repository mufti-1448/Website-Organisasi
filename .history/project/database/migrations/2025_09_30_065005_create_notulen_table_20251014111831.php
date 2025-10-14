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
            $table->string('rapat_id')->unique(); // 1 rapat 1 notulen
            $table->text('isi');
            $table->date('tanggal');
            $table->foreignId('penulis_id')->constrained('anggota')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notulen');
    }
};
