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
    $transaksi = TransaksiKasir::select(
        DB::raw("MONTH(created_at) as bulan"),
        DB::raw("MONTHNAME(created_at) as nama_bulan"),
        DB::raw("SUM(total) as totalPenjualan") // Gunakan total, bukan total_harga
    )
    ->whereYear('created_at', $currentYear)
    ->groupBy('bulan', 'nama_bulan')
    ->orderByRaw("MONTH(created_at)")
    ->get();
    
    

    $namaBulan = [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
        7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
    ];

    $dataPenjualan = collect(range(1, 12))->mapWithKeys(fn($m) => [$m => [
        'bulan' => $namaBulan[$m],
        'totalPenjualan' => 0
    ]]);

    $mergedPenjualan = $dataPenjualan->map(function ($data, $key) use ($transaksi) {
        $matching = $transaksi->firstWhere('bulan', $key);
        return $matching ? [
            'bulan' => $matching->nama_bulan,
            'totalPenjualan' => (float) $matching->totalPenjualan // Pastikan tipe data float
        ] : $data;
    });

    $bulan = array_values($mergedPenjualan->pluck('bulan')->toArray());
    $totalPenjualan = array_values($mergedPenjualan->pluck('totalPenjualan')->toArray());

    // Debugging (Hapus setelah dicek)
    // dd($bulan, $totalPenjualan);

    return view('admin.dashboard', compact('bulan', 'totalPenjualan'));
}

}
