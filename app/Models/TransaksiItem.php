<?php

// app/Models/TransaksiItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    protected $table = 'transaksi_items';
    
    protected $fillable = [
        'transaksi_id',
        'plu',
        'nama_barang',
        'kategori',
        'qty',
        'harga_satuan',
        'diskon',
        'total'
    ];
}
