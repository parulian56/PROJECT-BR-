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
            $table->id(); // ID transaksi
            $table->string('nama_produk'); // Nama produk
            $table->integer('jumlah'); // Jumlah produk
            $table->decimal('harga', 15, 2); // Harga produk, bisa menampung hingga milyaran
            $table->decimal('total_harga', 15, 2); // Total harga (jumlah * harga)
            $table->decimal('bayar', 15, 2); // Uang yang dibayar
            $table->decimal('kembalian', 15, 2); // Kembalian
            $table->timestamps(); // Kolom created_at dan updated_at
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
