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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembayaran')->unique();
            $table->string('nis');
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 20);
            $table->year('tahun_dibayar');
            $table->integer('jumlah_bayar');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('nis')->references('nis')->on('siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
