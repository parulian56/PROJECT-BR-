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
        $currentYear = now()->year;

        // Ambil data transaksi per bulan
        $transaksi = TransaksiKasir::select(
            DB::raw("MONTH(created_at) as bulan"),
            DB::raw("MONTHNAME(created_at) as nama_bulan"),
            DB::raw("SUM(total) as totalPenjualan")
        )
        ->whereYear('created_at', $currentYear)
        ->groupBy('bulan', 'nama_bulan')
        ->orderByRaw("MONTH(created_at)")
        ->get();
        
        // Daftar bulan dengan nilai default
        $namaBulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
            7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];

        // Gabungkan hasil query dengan data default
        $mergedPenjualan = collect($namaBulan)->map(function ($nama, $bulan) use ($transaksi) {
            return [
                'bulan' => $nama,
                'totalPenjualan' => isset($transaksi[$bulan]) ? (float) $transaksi[$bulan]->totalPenjualan : 0
            ];
        });

        // Konversi hasil akhir menjadi array untuk dikirim ke view
        $bulan = $mergedPenjualan->pluck('bulan')->toArray();
        $totalPenjualan = $mergedPenjualan->pluck('totalPenjualan')->toArray();

        return view('admin.dashboard', compact('bulan', 'totalPenjualan'));
    }
}
