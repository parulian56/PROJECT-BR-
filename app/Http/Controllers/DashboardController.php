<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $hariIni = Carbon::now('Asia/Jakarta')->toDateString();

            // Jumlah transaksi hari ini
            $totalTransaksiHariIni = Transaksi::whereDate('created_at', $hariIni)->count();

            // Total pendapatan hari ini (langsung dari transaksi_details)
            $pendapatanHariIni = DB::table('transaksi_details')
                ->join('data', 'transaksi_details.data_id', '=', 'data.id')
                ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
                ->whereDate('transaksis.created_at', $hariIni)
                ->sum(DB::raw('transaksi_details.qty * data.harga_jual'));

            // Total produk terjual hari ini
            $produkTerjualHariIni = DB::table('transaksi_details')
                ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
                ->whereDate('transaksis.created_at', $hariIni)
                ->sum('qty');

            // Rata-rata pendapatan per transaksi
            $rataTransaksiHariIni = $totalTransaksiHariIni > 0
                ? $pendapatanHariIni / $totalTransaksiHariIni
                : 0;

            // Persentase kenaikan dari kemarin
            $kenaikan = $this->hitungKenaikanDariKemarin();

            // Transaksi terbaru hari ini + total hitung manual
            $transaksiTerbaru = Transaksi::with('details.data')
                ->whereDate('created_at', $hariIni)
                ->orderByDesc('created_at')
                ->take(5)
                ->get()
                ->map(function ($transaksi) {
                    $total = $transaksi->details->sum(function ($item) {
                        return $item->qty * $item->data->harga_jual;
                    });
                    $transaksi->total = $total;
                    return $transaksi;
                });

            // Produk terlaris hari ini
            $produkTerlaris = DB::table('transaksi_details')
                ->join('data', 'transaksi_details.data_id', '=', 'data.id')
                ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
                ->select(
                    'data.nama_barang as name',
                    'data.codetrx as plu',
                    DB::raw('SUM(transaksi_details.qty) as sold'),
                    DB::raw('SUM(transaksi_details.qty * data.harga_jual) as revenue')
                )
                ->whereDate('transaksis.created_at', Carbon::today('Asia/Jakarta'))
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
        $hariIni = Carbon::now('Asia/Jakarta')->toDateString();
        $kemarin = Carbon::yesterday('Asia/Jakarta')->toDateString();

        // Total pendapatan hari ini dari details
        $pendapatanHariIni = DB::table('transaksi_details')
            ->join('data', 'transaksi_details.data_id', '=', 'data.id')
            ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
            ->whereDate('transaksis.created_at', $hariIni)
            ->sum(DB::raw('transaksi_details.qty * data.harga_jual'));

        // Total pendapatan kemarin dari details
        $pendapatanKemarin = DB::table('transaksi_details')
            ->join('data', 'transaksi_details.data_id', '=', 'data.id')
            ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
            ->whereDate('transaksis.created_at', $kemarin)
            ->sum(DB::raw('transaksi_details.qty * data.harga_jual'));

        // Jumlah transaksi
        $transaksiHariIni = Transaksi::whereDate('created_at', $hariIni)->count();
        $transaksiKemarin = Transaksi::whereDate('created_at', $kemarin)->count();

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
