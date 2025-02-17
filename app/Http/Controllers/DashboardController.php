<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;
    
        // Ambil data transaksi per bulan dengan nama bulan
        $transaksi = TransaksiKasir::select(
            DB::raw("MONTH(created_at) as bulan"),
            DB::raw("MONTHNAME(created_at) as nama_bulan"),
            DB::raw("SUM(total_harga) as totalPenjualan")
        )
        ->whereYear('created_at', $currentYear) // Hanya tahun ini
        ->groupBy('bulan', 'nama_bulan')
        ->orderByRaw("MONTH(created_at)")
        ->get();
    
        // List nama bulan dalam urutan benar
        $namaBulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
            7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];
    
        // Inisialisasi semua bulan dengan nilai 0 jika tidak ada transaksi
        $dataPenjualan = collect(range(1, 12))->mapWithKeys(fn($m) => [$m => [
            'bulan' => $namaBulan[$m],
            'totalPenjualan' => 0
        ]]);
    
        // Gabungkan data aktual dengan bulan yang tidak ada transaksi
        $mergedPenjualan = $dataPenjualan->map(function ($data, $key) use ($transaksi) {
            $matching = $transaksi->firstWhere('bulan', $key);
            return $matching ? [
                'bulan' => $matching->nama_bulan,
                'totalPenjualan' => $matching->totalPenjualan
            ] : $data;
        });
    
        // Ambil daftar transaksi terbaru
        $barangTerjual = TransaksiKasir::latest()->limit(10)->get();
    
        // Kirim data ke view
        return view('dashboard', [
            'bulan' => $mergedPenjualan->pluck('bulan'),
            'totalPenjualan' => $mergedPenjualan->pluck('totalPenjualan'),
            'barangTerjual' => $barangTerjual
        ]);
    }
}   