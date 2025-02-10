<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data transaksi per bulan
        $penjualan = Transaksi::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total_penjualan')
            ->whereYear('created_at', date('Y')) // Hanya ambil tahun ini
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        // Daftar nama bulan
        $namaBulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];

        // Konversi angka bulan ke nama bulan
        $bulan = $penjualan->pluck('bulan')->map(fn($b) => $namaBulan[$b] ?? 'Unknown');
        $totalPenjualan = $penjualan->pluck('total_penjualan');

        // Debugging untuk cek data
        if ($penjualan->isEmpty()) {
            return view('dashboard', compact('bulan', 'totalPenjualan'))->with('error', 'Tidak ada data transaksi untuk grafik.');
        }

        return view('dashboard', compact('bulan', 'totalPenjualan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
