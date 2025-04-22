<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();

        // Data hari ini
        $hariIni = Transaksi::whereDate('created_at', $today)->get();
        $totalHariIni = $hariIni->sum('total');
        $jumlahTransaksiHariIni = $hariIni->count();
        $totalQtyHariIni = $hariIni->sum('qty');

        // Data minggu ini
        $mingguIni = Transaksi::whereBetween('created_at', [$startOfWeek, now()])->get();
        $totalMingguIni = $mingguIni->sum('total');

        // Data bulan ini
        $bulanIni = Transaksi::whereBetween('created_at', [$startOfMonth, now()])->get();
        $totalBulanIni = $bulanIni->sum('total');

        return view('report.index', compact(
            'totalHariIni', 'jumlahTransaksiHariIni', 'totalQtyHariIni',
            'totalMingguIni', 'totalBulanIni'
        ));
    }
}
