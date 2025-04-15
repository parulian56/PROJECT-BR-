<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasir extends Model
{
    use HasFactory;

    protected $table = 'transaksi_kasir';

    protected $fillable = ['plu', 'deskripsi', 'qty', 'harga', 'diskon','total'];

    protected $attributes = [
        'diskon' => 0,
        'total' => 0,
    ];

    public $timestamps = false;

    // Event untuk menghitung total sebelum transaksi disimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            if (TransaksiKasir::where('plu', $transaksi->plu)->exists()) {
                throw new \Exception('PLU sudah digunakan!');
            }
            $transaksi->hitungTotal();
        });

        static::updating(function ($transaksi) {
            $transaksi->hitungTotal();
        });
    }

    // Metode untuk menghitung total transaksi
    public function hitungTotal()
    {
        $hargaSetelahDiskon = ($this->harga - $this->diskon);
       
    }
}
