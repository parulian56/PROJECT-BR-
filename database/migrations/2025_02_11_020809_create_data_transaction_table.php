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
        Schema::create('data', function (Blueprint $table) {
            $table->id(); // ID transaksi (auto-increment)
            $table->string('nama_produk'); // Nama produk (tipe data string)
            $table->decimal('jumlah', 15, 2); // Jumlah produk (tipe data decimal)
            $table->decimal('harga_satuan', 15, 2); // Harga satuan produk (tipe data decimal)
            $table->string('lokasi_penyimpanan'); // Lokasi penyimpanan (tipe data string)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data'); // Menghapus tabel 'transaksi'
    }
};