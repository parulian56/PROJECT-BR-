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
            $table->string('nama_barang'); // Nama produk (tipe data string)
            $table->string('kategori'); // kategori produk yang dijual
            $table->text('deskripsi')->nullable(); // Deskripsi produk (bisa kosong)
            $table->decimal('jumlah', 15, 2); // Jumlah produk (tipe data decimal)
            $table->decimal('harga_pokok', 16, 2); //Harga pokok produk
            $table->decimal('harga_jual', 15, 2); // Harga satuan produk (tipe data decimal)
            $table->string('lokasi_penyimpanan'); // Lokasi penyimpanan (tipe data string)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data'); // Menghapus tabel 'data' jika rollback
    }
};
