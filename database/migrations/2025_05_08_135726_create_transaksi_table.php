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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_pembeli');
            $table->dateTime('tanggal');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('diproses');
            $table->timestamps();
        
            $table->foreign('id_pembeli')->references('id_user')->on('user')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
