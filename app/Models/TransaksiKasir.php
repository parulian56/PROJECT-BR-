<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasir extends Model
{
    use HasFactory;
    protected $table = 'transaksi_kasir';

    protected $fillable = [
        'nama_produk', 
        'jumlah', 
        'harga_satuan', 
        'total_harga', 
        'bayar', 
        'kembalian',
    ];
}
