<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    
    public function index(Request $request)
{
    $filter = $request->input('filter', 'harian'); // default: harian

    // Menentukan tanggal awal dan akhir berdasarkan filter
    $dateFrom = now()->startOfDay();
    $dateTo = now()->endOfDay();

    if ($filter == 'mingguan') {
        $dateFrom = now()->startOfWeek();
        $dateTo = now()->endOfWeek();
    } elseif ($filter == 'bulanan') {
        $dateFrom = now()->startOfMonth();
        $dateTo = now()->endOfMonth();
    } elseif ($filter == 'tahunan') {
        $dateFrom = now()->startOfYear();
        $dateTo = now()->endOfYear();
    }

    // Ambil data transaksi berdasarkan tanggal
    $transaksis = TransaksiKasir::whereBetween('created_at', [$dateFrom, $dateTo])->get();

    // Kirim ke view
    return view('admin.reports.index', compact('transaksis', 'filter'));
}


    public function daily()
{
    $tanggalHariIni = Carbon::today();
    $transaksis = TransaksiKasir::whereDate('created_at', Carbon::today())->get();
    return view('admin.reports.daily', compact('transaksis'));
}
public function weekly()
{
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    $transaksis = TransaksiKasir::whereBetween('created_at', [$startOfWeek, $endOfWeek])->orderBy('created_at', 'desc')->get();

    return view('admin.reports.weekly', compact('transaksis'));
}

}
