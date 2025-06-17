<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Menampilkan laporan utama berdasarkan filter (harian, mingguan, bulanan, tahunan)
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'harian'); // Default: harian

        switch ($filter) {
            case 'mingguan':
                $dateFrom = Carbon::now()->startOfWeek();
                $dateTo = Carbon::now()->endOfWeek();
                break;
            case 'bulanan':
                $dateFrom = Carbon::now()->startOfMonth();
                $dateTo = Carbon::now()->endOfMonth();
                break;
            case 'tahunan':
                $dateFrom = Carbon::now()->startOfYear();
                $dateTo = Carbon::now()->endOfYear();
                break;
            default:
                $dateFrom = Carbon::now()->startOfDay();
                $dateTo = Carbon::now()->endOfDay();
        }

        $transaksis = TransaksiKasir::whereBetween('created_at', [$dateFrom, $dateTo])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        $rataTransaksiHariIni = $transaksis->count() > 0
            ? round($total / $transaksis->count())
            : 0;

        return view('admin.reports.index', [
            'transaksis' => $transaksis,
            'filter' => $filter,
            'total' => $total,
            'totalTransaksiHariIni' => $transaksis->count(),
            'pendapatanHariIni' => $total,
            'produkTerjualHariIni' => 0,
            'rataTransaksiHariIni' => $rataTransaksiHariIni,
            'avgTransaksi' => $rataTransaksiHariIni,
            'kenaikan' => ['transaksi' => 0, 'pendapatan' => 0],
            'transaksiTerbaru' => [],
            'produkTerlaris' => [],
        ]);


    }

    /**
     * Laporan Harian
     */
    public function daily()
    {
        $transaksis = TransaksiKasir::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        return view('admin.reports.daily', compact('transaksis', 'total'));
    }

    /**
     * Laporan Mingguan
     */
    public function weekly()
    {
        $transaksis = TransaksiKasir::whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        return view('admin.reports.weekly', compact('transaksis', 'total'));
    }

    /**
     * Laporan Bulanan
     */
    public function monthly()
    {
        $transaksis = TransaksiKasir::whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        return view('admin.reports.monthly', compact('transaksis', 'total'));
    }

    /**
     * Laporan Tahunan
     */
    public function yearly()
    {
        $transaksis = TransaksiKasir::whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear()
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        return view('admin.reports.yearly', compact('transaksis', 'total'));
    }

    /**
     * Laporan dengan Rentang Tanggal Kustom
     */
    public function custom(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $transaksis = TransaksiKasir::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $transaksis->sum('total');

        return view('admin.reports.custom', compact('transaksis', 'startDate', 'endDate', 'total'));
    }
}
