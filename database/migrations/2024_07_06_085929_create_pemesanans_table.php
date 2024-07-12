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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->longText('list_data_pesanan')->nullable();
            $table->longText('kode_pesanan')->nullable();
            $table->string('nama_kasir')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('pembayaran')->nullable();
            $table->integer('status_pemesanan')->nullable();

            // $table->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
