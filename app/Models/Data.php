<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';

    protected $fillable = [
        'nama_barang',
        'nama_produk',
        'jumlah',
        'harga_satuan',
        'lokasi_penyimpanan',
    ];
}
