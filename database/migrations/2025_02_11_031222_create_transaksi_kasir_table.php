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
        Schema::create('transaksi_kasir', function (Blueprint $table) { // Perbaiki nama tabel
            $table->id(); // ID transaksi (auto-increment)
            $table->string('nama_produk'); // Nama produk
            $table->decimal('jumlah', 15, 2); // Jumlah produk
            $table->decimal('harga_satuan', 15, 2); // Harga satuan produk
            $table->decimal('total_harga', 15, 2); // Total harga
            $table->decimal('bayar', 15, 2); // Jumlah uang yang dibayarkan
            $table->decimal('kembalian', 15, 2); // Uang kembalian
            $table->string('metode_pembayaran'); // Metode pembayaran (cash, debit, dll.)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kasir'); // Menghapus tabel 'transaksi_kasir'
    }
};
