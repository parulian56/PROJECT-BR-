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
            $table->string('id'); // Nama produk
            $table->integer('nama_produk'); // Jumlah produk
            $table->decimal('jumlah', 15, 2); // Harga produk, bisa menampung hingga milyaran
            $table->decimal('harga_satuan', 15, 2); // Total harga (jumlah * harga)
            $table->decimal('lokasi_penyimpanan', 15, 2); // Uang yang dibayar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transaksi');
    }
};
