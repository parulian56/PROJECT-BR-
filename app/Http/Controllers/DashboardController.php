<?php

namespace App\Http\Controllers;
use App\Models\Transaksi; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data penjualan bulanan dari database (sesuaikan dengan skema Anda)
        $penjualan = Transaksi::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total_penjualan')
                            ->groupBy('bulan')
                            ->orderBy('bulan', 'asc')
                            ->get();

        // Mengubah data menjadi format yang bisa digunakan di Chart.js
        $bulan = $penjualan->pluck('bulan');
        $totalPenjualan = $penjualan->pluck('total_penjualan');

        // Kirim data ke view
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
