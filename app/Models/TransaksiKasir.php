<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasir extends Model
{
    use HasFactory;

    protected $fillable = [
        'plu',
        'deskripsi',
        'qty',
        'harga',
        'diskon',
        'total',
    ];

    protected $table = 'transaksi_kasir';

}