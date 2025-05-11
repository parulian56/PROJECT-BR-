<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    
    public function index(Request $request, $filter = 'harian')
    {
        // Menentukan tanggal awal dan akhir berdasarkan filter yang dipilih
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

        // Ambil data transaksi berdasarkan filter
        $transaksis = TransaksiKasir::whereBetween('created_at', [$dateFrom, $dateTo])->get();

        // Kirim data ke view
        return view('admin.reports.reports', [
            'transaksis' => $transaksis,
            'filter' => $filter

        ]);
    }
    public function daily()
{
    $tanggalHariIni = Carbon::today();
    $transaksis = TransaksiKasir::whereDate('created_at', Carbon::today())->get();
    return view('admin.reports.daily', compact('transaksis'));
}
}
