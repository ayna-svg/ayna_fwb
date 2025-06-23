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
        Schema::create('pupuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pupuk', 100); // Batasi panjang nama jika perlu
            $table->text('deskripsi');         // Lebih tepat daripada string
            $table->unsignedInteger('harga');  // Gunakan unsigned (tidak mungkin harga negatif)
            $table->unsignedInteger('stok');   // Stok juga tidak mungkin negatif
            $table->string('gambar')->nullable();
            $table->timestamps();
        
        });

        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pupuk_id');
            $table->string('nama_pupuk');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->string('supplier');
            $table->timestamps();
        
            $table->foreign('pupuk_id')->references('id')->on('pupuks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangs');
    }
};
