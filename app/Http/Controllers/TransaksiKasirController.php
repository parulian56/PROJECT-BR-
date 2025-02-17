<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKasir;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        
        // Ambil data transaksi per bulan
        $penjualan = TransaksiKasir::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total_penjualan')
            ->whereYear('created_at', $currentYear)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get()
            ->keyBy('bulan');

        // Inisialisasi semua bulan dengan nilai 0
        $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => [
                'bulan' => $month,
                'total_penjualan' => 0
            ]];
        });

        // Gabungkan data aktual dengan bulan yang tidak memiliki transaksi
        $mergedPenjualan = $allMonths->map(function ($monthData) use ($penjualan) {
            $actualData = $penjualan->get($monthData['bulan']);
            return $actualData ?: $monthData;
        });

        // Konversi ke format yang diperlukan
        $namaBulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];

        $bulan = $mergedPenjualan->pluck('bulan')->map(fn($b) => $namaBulan[$b]);
        $totalPenjualan = $mergedPenjualan->pluck('total_penjualan');

        // Ambil daftar barang terjual
        $barangTerjual = TransaksiKasir::latest()->limit(10)->get();

        return view('dashboard', compact('bulan', 'totalPenjualan', 'barangTerjual'));
    }
}

class TransaksiKasirController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksis = TransaksiKasir::all();
        return view('transaksi.index', compact('transaksis'));
    }

    // Menampilkan form untuk menambah transaksi
    public function create()
    {
        return view('transaksi.create');
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric',
            'bayar' => 'required|numeric',
        ],
        [
            'nama_produk.required' => 'tidak boleh kosong',
            'jumlah.required' => 'tidak boleh kosong, harus angka, dan harus diisi',
            'harga_satuan.required' => 'tidak boleh kosong, dan harus angka',
            'bayar.required' => 'tidak boleh kosong, dan harus angka',
        ]);

        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = $request->bayar - $total_harga;

        TransaksiKasir::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    // Menyimpan perubahan transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        $transaksi = TransaksiKasir::findOrFail($id);

        $total_harga = $request->jumlah * $request->harga_satuan;
        $kembalian = $request->bayar - $total_harga;

        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = TransaksiKasir::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
