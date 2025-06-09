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
        Schema::create('transaksi_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
    $table->string('plu');
    $table->string('nama_barang');
    $table->string('kategori');
    $table->integer('qty');
    $table->decimal('harga_satuan', 15, 2);
    $table->decimal('diskon', 15, 2)->default(0);
    $table->decimal('total', 15, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_items');
    }
};
