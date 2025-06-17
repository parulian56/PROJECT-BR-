<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = [
        'transaksi_id',
        'data_id',
        'qty'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function data()
    {
  
    return $this->belongsTo(\App\Models\Data::class, 'data_id');
    }

    
}