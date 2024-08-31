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
        Schema::table('produks', function (Blueprint $table) {
            //
            $table->string('kode_bahan_1')->nullable();
            $table->integer('stok_bahan_1')->nullable();
            $table->string('satuan_1')->nullable();

            $table->string('kode_bahan_2')->nullable();
            $table->integer('stok_bahan_2')->nullable();
            $table->string('satuan_2')->nullable();

            $table->string('kode_bahan_3')->nullable();
            $table->integer('stok_bahan_3')->nullable();
            $table->string('satuan_3')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            //
        });
    }
};
