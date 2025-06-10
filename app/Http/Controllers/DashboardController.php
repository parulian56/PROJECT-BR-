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
        // Jika user adalah admin
        if (auth()->user()->role === 'admin') {
            // Hitung total transaksi hari ini
            $totalTransaksiHariIni = Transaksi::whereDate('tanggal', today())->count();
            
            // Hitung pendapatan hari ini
            $pendapatanHariIni = Transaksi::whereDate('tanggal', today())->sum('total');
            
            // Hitung produk terjual hari ini
            $produkTerjualHariIni = DB::table('transaksi_items')
                ->join('transaksis', 'transaksi_items.transaksi_id', '=', 'transaksis.id')
                ->whereDate('transaksis.tanggal', today())
                ->sum('qty');
                
            // Hitung rata-rata transaksi hari ini
            $rataTransaksiHariIni = $totalTransaksiHariIni > 0 
                ? $pendapatanHariIni / $totalTransaksiHariIni 
                : 0;
            
            // Ambil data persentase kenaikan dari kemarin
            $kenaikan = $this->hitungKenaikanDariKemarin();
            
            // Ambil transaksi terbaru hari ini
            $transaksiTerbaru = Transaksi::with('items')
                ->whereDate('tanggal', today())
                ->orderBy('tanggal', 'desc')
                ->take(5)
                ->get();
                
            // Ambil produk terlaris hari ini
            // Ambil produk terlaris hari ini
$produkTerlaris = DB::table('transaksi_items')
    ->join('data', 'transaksi_items.plu', '=', 'data.codetrx')
    ->join('transaksis', 'transaksi_items.transaksi_id', '=', 'transaksis.id')
    ->select(
        'data.nama_barang as name',
        'data.codetrx as plu',
        DB::raw('SUM(transaksi_items.qty) as sold'),
        DB::raw('SUM(transaksi_items.total) as revenue')
    )
    ->whereDate('transaksis.tanggal', today())
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
        
        // Jika user adalah kasir
        return view('user.dashboard');
    }
    
    protected function hitungKenaikanDariKemarin()
    {
        $hariIni = Carbon::today();
        $kemarin = Carbon::yesterday();
        
        // Data hari ini
        $transaksiHariIni = Transaksi::whereDate('tanggal', $hariIni)->count();
        $pendapatanHariIni = Transaksi::whereDate('tanggal', $hariIni)->sum('total');
        
        // Data kemarin
        $transaksiKemarin = Transaksi::whereDate('tanggal', $kemarin)->count();
        $pendapatanKemarin = Transaksi::whereDate('tanggal', $kemarin)->sum('total');
        
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