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
        Schema::create('daftar_services', function (Blueprint $table) {
            $table->id('id_servis');
            $table->string('no_plat');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('nama_pelanggan'); // Auto-fill
            $table->text('keluhan_kendaraan');
            $table->date('tanggal_servis');
            $table->timestamps();

            $table->foreign('no_plat')->references('no_plat')->on('kendaraans')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_services');
    }
};