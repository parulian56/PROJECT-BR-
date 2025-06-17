<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    if (auth()->user()->role === 'admin') {
        $totalTransaksiHariIni = Transaksi::whereDate('created_at', today())->count();

        $pendapatanHariIni = Transaksi::whereDate('created_at', today())->sum('total_harga');

        $produkTerjualHariIni = DB::table('transaksi_items')
            ->join('transaksis', 'transaksi_items.transaksi_id', '=', 'transaksis.id')
            ->whereDate('transaksis.created_at', today()) // juga ubah ini ke created_at kalau konsisten
            ->sum('qty');

        $rataTransaksiHariIni = $totalTransaksiHariIni > 0 
            ? $pendapatanHariIni / $totalTransaksiHariIni 
            : 0;

        $kenaikan = $this->hitungKenaikanDariKemarin();

        $transaksiTerbaru = Transaksi::with('items')
            ->whereDate('created_at', today()) // konsisten juga
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $produkTerlaris = DB::table('transaksi_items')
            ->join('data', 'transaksi_items.plu', '=', 'data.codetrx')
            ->join('transaksis', 'transaksi_items.transaksi_id', '=', 'transaksis.id')
            ->select(
                'data.nama_barang as name',
                'data.codetrx as plu',
                DB::raw('SUM(transaksi_items.qty) as sold'),
                DB::raw('SUM(transaksi_items.total) as revenue')
            )
            ->whereDate('transaksis.created_at', today()) // konsisten
            ->groupBy('data.codetrx', 'data.nama_barang')
            ->orderByDesc('sold')
            ->take(4)
            ->get();

        return view('admin.dashboard', compact(
            'totalTransaksiHariIni',
            'pendapatanHariIni',
            'produkTerjualHariIni',
            'rataTransaksiHariIni',
            'kenaikan',
            'transaksiTerbaru',
            'produkTerlaris'
        ));
    }

    return view('user.dashboard');
}

    
    protected function hitungKenaikanDariKemarin()
{
    $hariIni = Carbon::today();
    $kemarin = Carbon::yesterday();

    // Data hari ini
    $transaksiHariIni = Transaksi::whereDate('created_at', $hariIni)->count();
    $pendapatanHariIni = Transaksi::whereDate('created_at', $hariIni)->sum('total_harga');

    // Data kemarin
    $transaksiKemarin = Transaksi::whereDate('created_at', $kemarin)->count();
    $pendapatanKemarin = Transaksi::whereDate('created_at', $kemarin)->sum('total_harga');

    // Hitung persentase kenaikan
    $kenaikanTransaksi = $transaksiKemarin > 0 
        ? (($transaksiHariIni - $transaksiKemarin) / $transaksiKemarin) * 100 
        : 0;

    $kenaikanPendapatan = $pendapatanKemarin > 0 
        ? (($pendapatanHariIni - $pendapatanKemarin) / $pendapatanKemarin) * 100 
        : 0;

    return [
        'transaksi' => $kenaikanTransaksi,
        'pendapatan' => $kenaikanPendapatan
    ];
}

}