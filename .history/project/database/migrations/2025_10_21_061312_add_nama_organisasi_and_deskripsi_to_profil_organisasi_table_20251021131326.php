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
        Schema::table('profil_organisasi', function (Blueprint $table) {
            $table->string('nama_organisasi')->after('id');
            $table->text('deskripsi')->after('nama_organisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_organisasi', function (Blueprint $table) {
            $table->dropColumn(['nama_organisasi', 'deskripsi']);
        });
    }
};
