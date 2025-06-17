<?php
// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'kode_transaksi',
        'total_harga',
        'uang_dibayar',
        'kembalian'
    ];

    public function items()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}


