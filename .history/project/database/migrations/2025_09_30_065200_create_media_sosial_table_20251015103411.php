<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_sosial', function (Blueprint $table) {
            $table->id();
            $table->string('nama_platform'); // Facebook, Instagram, Twitter, dll
            $table->string('url'); // Link ke media sosial
            $table->string('icon')->nullable(); // Bootstrap icon class
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_sosial');
    }
};
