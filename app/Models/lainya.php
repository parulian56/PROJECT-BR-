<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Lainya extends Model
{
    use HasFactory;

    protected $table = 'lainya';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'deskripsi',
        'nama_produk',
        'jumlah',
        'harga_pokok',
        'harga_jual',
        'lokasi_penyimpanan',

    ];
}
