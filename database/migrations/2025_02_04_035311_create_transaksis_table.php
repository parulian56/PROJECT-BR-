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
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');
        $table->integer('jumlah');
        $table->decimal('harga', 10, 2);
        $table->decimal('total_harga', 10, 2);
        $table->decimal('bayar', 10, 2);
        $table->decimal('kembalian', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
