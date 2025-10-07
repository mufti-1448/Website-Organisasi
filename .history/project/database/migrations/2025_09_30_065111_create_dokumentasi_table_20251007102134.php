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
            $table->id();            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->date('tanggal');
            $table->string('kategori')->nullable();
            $table->timestamps();

            // 👇 Baru kemudian definisikan foreign key-nya
            $table->foreign('rapat_id')
                ->references('id')
                ->on('rapat')
                ->onDelete('cascade');
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
