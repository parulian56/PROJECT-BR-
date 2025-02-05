<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'jumlah', 'harga', 'total_harga', 'bayar', 'kembalian'];
}

