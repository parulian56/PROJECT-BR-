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

    protected $casts = [
        'jumlah' => 'integer',
        'harga_satuan' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'bayar' => 'decimal:2',
        'kembalian' => 'decimal:2',
    ];
}
