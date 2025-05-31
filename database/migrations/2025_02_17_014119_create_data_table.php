<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    /**
     * Run the migrations.
     */
    public function up()
{


    if (!Schema::hasTable('data')) {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->decimal('codetrx',15,2);
            $table->string('nama_barang');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->decimal('stok', 15, 2);
            $table->decimal('harga_pokok', 16, 2);
            $table->decimal('harga_jual', 15, 2);
            $table->string('lokasi_penyimpanan');
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data'); // Menghapus tabel 'data' jika rollback
    }
};
