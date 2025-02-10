<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaBarangToDataTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            // Tambahkan kolom `nama_barang` dengan tipe data string
            $table->string('nama_barang')->after('id'); // Sesuaikan posisi kolom jika perlu
        });
    }

    /**
     * Batalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data', function (Blueprint $table) {
            // Hapus kolom `nama_barang` jika migrasi di-rollback
            $table->dropColumn('nama_barang');
        });
    }
}