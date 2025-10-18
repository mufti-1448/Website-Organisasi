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
        Schema::table('dokumentasi', function (Blueprint $table) {
            $table->dropForeign(['rapat_id']);
            $table->dropForeign(['program_id']);
            $table->dropColumn(['rapat_id', 'program_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumentasi', function (Blueprint $table) {
            $table->string('rapat_id');
            $table->foreignId('program_id')->nullable()->constrained('program_kerja')->onDelete('cascade');
            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('cascade');
        });
    }
};
