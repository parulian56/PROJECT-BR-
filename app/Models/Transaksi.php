<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'total',
        'uang_dibayar',
        'kembalian',
        'tanggal',
        'status',
        'user_id',
    ];

    // Tambahkan $casts untuk konversi otomatis
    protected $casts = [
        'tanggal' => 'datetime', // Konversi string DB ke Carbon
    ];

    public function items(): HasMany
    {
        return $this->hasMany(TransaksiItem::class); 
    }
}