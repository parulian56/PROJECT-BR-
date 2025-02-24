<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasir extends Model
{
    use HasFactory;

    protected $table = 'transaksi_kasir';

    protected $fillable = ['plu', 'deskripsi', 'qty', 'harga', 'diskon', 'fee', 'total'];

    protected $attributes = [
        'diskon' => 0,
        'fee' => 0,
        'total' => 0,
    ];

    // Jika tabel tidak memiliki timestamps (created_at, updated_at), tambahkan ini:
    public $timestamps = false;

    // Mutator untuk menghitung total secara otomatis
    public function setTotalAttribute()
    {
        $hargaSetelahDiskon = ($this->harga - $this->diskon);
        $this->attributes['total'] = ($hargaSetelahDiskon * $this->qty) + $this->fee;
    }
}
