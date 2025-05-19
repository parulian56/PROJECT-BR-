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
        // database/migrations/xxxx_create_makanans_table.php
Schema::create('data_minuman', function (Blueprint $table) {
    $table->id();
    $table->string('nama_barang');
    $table->string('kategori');
    $table->text('deskripsi')->nullable();
    $table->integer('jumlah');
    $table->decimal('harga_pokok', 10, 2);
    $table->decimal('harga_jual', 10, 2);
    $table->string('lokasi_penyimpanan');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_minuman');
    }
};
