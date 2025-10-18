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
            $table->string('rapat_id')->nullable()->after('id');
            $table->foreign('rapat_id')->references('id')->on('rapat')->onDelete('set null');
            $table->string('program_id')->nullable()->after('rapat_id');
            $table->foreign('program_id')->references('id')->on('program_kerja')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumentasi', function (Blueprint $table) {
            $table->dropForeign(['rapat_id']);
            $table->dropColumn('rapat_id');
        });
    }
};
