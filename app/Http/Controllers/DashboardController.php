<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data transaksi per bulan
        $penjualan = TransaksiKasir::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total_penjualan')
            ->whereYear('created_at', date('Y')) // Hanya ambil transaksi tahun ini
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get()
            ->keyBy('bulan'); // Mengubah menjadi associative array berdasarkan bulan

        // Nama bulan dalam format singkatan
        $namaBulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];

        // Pastikan semua bulan ada dalam array (isi 0 jika tidak ada transaksi)
        $bulan = [];
        $totalPenjualan = [];
        foreach ($namaBulan as $key => $name) {
            $bulan[] = $name;
            $totalPenjualan[] = $penjualan[$key]->total_penjualan ?? 0;
        }

        // Ambil daftar barang yang terjual terbaru
        $barangTerjual = TransaksiKasir::select('nama_produk', 'jumlah', 'total_harga', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(10) // Ambil 10 transaksi terbaru
            ->get();

        return view('dashboard', compact('bulan', 'totalPenjualan', 'barangTerjual'));
    }
}
