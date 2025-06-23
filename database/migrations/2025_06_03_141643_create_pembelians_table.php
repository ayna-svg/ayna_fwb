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
       // migration pembelian
    Schema::create('pembelians', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pupuk');
        $table->string('jenis');
        $table->integer('jumlah');
        $table->decimal('harga_satuan', 10, 2);
        $table->string('supplier');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
