<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    // Tambahkan ini:
    protected $table = 'data';

    // Kolom-kolom yang bisa diisi massal
    protected $fillable = [
        'nama_barang',
        'kategori',
        'deskripsi',
        'jumlah',
        'harga_pokok',
        'harga_jual',
        'lokasi_penyimpanan',
    ];
}
