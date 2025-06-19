<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'harian');

        switch ($filter) {
            case 'mingguan':
                $dateFrom = Carbon::now('Asia/Jakarta')->startOfWeek();
                $dateTo = Carbon::now('Asia/Jakarta')->endOfWeek();
                break;
            case 'bulanan':
                $dateFrom = Carbon::now('Asia/Jakarta')->startOfMonth();
                $dateTo = Carbon::now('Asia/Jakarta')->endOfMonth();
                break;
            case 'tahunan':
                $dateFrom = Carbon::now('Asia/Jakarta')->startOfYear();
                $dateTo = Carbon::now('Asia/Jakarta')->endOfYear();
                break;
            default:
                $dateFrom = Carbon::now('Asia/Jakarta')->startOfDay();
                $dateTo = Carbon::now('Asia/Jakarta')->endOfDay();
        }

        $transaksis = Transaksi::with(['details.data', 'user'])
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalTransaksi = $transaksis->count();
        $totalPendapatan = $transaksis->sum('total_harga');

        $produkTerjual = $transaksis->sum(function ($transaksi) {
            return $transaksi->details->sum('qty');
        });

        $rataTransaksi = $totalTransaksi > 0 ? round($totalPendapatan / $totalTransaksi) : 0;

        $produkTerlaris = DB::table('transaksi_details')
            ->join('data', 'transaksi_details.data_id', '=', 'data.id')
            ->join('transaksis', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
            ->select(
                'data.nama_barang as name',
                'data.codetrx as plu',
                DB::raw('SUM(transaksi_details.qty) as sold'),
                DB::raw('SUM(transaksi_details.qty * data.harga_jual) as revenue')
            )
            ->whereBetween('transaksis.created_at', [$dateFrom, $dateTo])
            ->groupBy('data.codetrx', 'data.nama_barang')
            ->orderByDesc('sold')
            ->take(4)
            ->get();

        return view('admin.reports.index', [
            'transaksis' => $transaksis,
            'filter' => $filter,
            'total' => $totalPendapatan,
            'totalTransaksiHariIni' => $totalTransaksi,
            'pendapatanHariIni' => $totalPendapatan,
            'produkTerjualHariIni' => $produkTerjual,
            'rataTransaksiHariIni' => $rataTransaksi,
            'avgTransaksi' => $rataTransaksi,
            'kenaikan' => $this->hitungKenaikanDariKemarin($dateFrom, $dateTo),
            'transaksiTerbaru' => $transaksis->take(5),
            'produkTerlaris' => $produkTerlaris,
        ]);
    }

    protected function hitungKenaikanDariKemarin($currentStart, $currentEnd)
    {
        $previousStart = Carbon::parse($currentStart)->subDay()->startOfDay();
        $previousEnd = Carbon::parse($currentEnd)->subDay()->endOfDay();

        $currentPendapatan = Transaksi::whereBetween('created_at', [$currentStart, $currentEnd])
            ->sum('total_harga');
        $currentTransaksi = Transaksi::whereBetween('created_at', [$currentStart, $currentEnd])
            ->count();

        $previousPendapatan = Transaksi::whereBetween('created_at', [$previousStart, $previousEnd])
            ->sum('total_harga');
        $previousTransaksi = Transaksi::whereBetween('created_at', [$previousStart, $previousEnd])
            ->count();

        $kenaikanTransaksi = $previousTransaksi > 0
            ? (($currentTransaksi - $previousTransaksi) / $previousTransaksi) * 100
            : ($currentTransaksi > 0 ? 100 : 0);

        $kenaikanPendapatan = $previousPendapatan > 0
            ? (($currentPendapatan - $previousPendapatan) / $previousPendapatan) * 100
            : ($currentPendapatan > 0 ? 100 : 0);

        return [
            'transaksi' => round($kenaikanTransaksi, 2),
            'pendapatan' => round($kenaikanPendapatan, 2)
        ];
    }

    public function daily()
    {
        $transaksis = Transaksi::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total_harga');

        return view('admin.reports.daily', compact('transaksis', 'total'));
    }

    public function weekly()
    {
        $transaksis = Transaksi::whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total_harga');

        return view('admin.reports.weekly', compact('transaksis', 'total'));
    }

    public function monthly()
    {
        $transaksis = Transaksi::whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total_harga');

        return view('admin.reports.monthly', compact('transaksis', 'total'));
    }

    public function yearly()
    {
        $transaksis = Transaksi::whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total_harga');

        return view('admin.reports.yearly', compact('transaksis', 'total'));
    }

    public function custom(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $transaksis = Transaksi::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total_harga');

        return view('admin.reports.custom', compact('transaksis', 'startDate', 'endDate', 'total'));
    }
}
