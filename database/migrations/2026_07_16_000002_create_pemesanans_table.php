<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('nomor_identitas', 16);
            $table->string('no_hp');
            $table->foreignId('wisata_id')->constrained('wisatas')->cascadeOnDelete();
            $table->date('tanggal_kunjungan');
            $table->integer('jumlah_dewasa');
            $table->integer('jumlah_anak');
            $table->integer('total_bayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
