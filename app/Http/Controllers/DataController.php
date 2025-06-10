<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Menampilkan semua data penyimpanan
    public function index()
    {
        // Ambil semua data penyimpanan
        $data = Data::paginate(10);

        // Kirim data penyimpanan ke tampilan
        return view('admin.data.index', compact('data'));
    }

    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        // Tampilkan form tambah data penyimpanan
        return view('admin.data.create');
    }

    public function stok(){
        return view('admin.data.stok');
    }


    // Menyimpan data penyimpanan baru
   public function store(Request $request)
{
    // Validasi input dari user, TANPA codetrx
    $request->validate([
        'nama_barang' => 'required|string',
        'kategori' => 'required|string',
        'deskripsi' => 'nullable|string',
        'stok' => 'required|integer|min:1',
        'harga_pokok' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0',
        'lokasi_penyimpanan' => 'required|string',
    ]);

    // Format tanggal: hari-bulan-tahun (tanpa pemisah)
    $todayFormatted = now()->format('dmY'); // contoh: 08062025

    // Hitung jumlah data hari ini
    $countToday = Data::whereRaw('DATE(created_at) = ?', [now()->toDateString()])->count() + 1;
    $order = str_pad($countToday, 2, '0', STR_PAD_LEFT); // contoh: 01, 02, dst

    // Format kode transaksi final
    $codetrx = "am-{$order}-{$todayFormatted}-id";

    // Simpan data
    Data::create([
        'codetrx' => $codetrx, // dibuat otomatis
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'deskripsi' => $request->deskripsi,
        'stok' => $request->stok,
        'harga_pokok' => $request->harga_pokok,
        'harga_jual' => $request->harga_jual,
        'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
    ]);

    return redirect()->route('admin.data.index')->with('success', 'Data berhasil disimpan!');
}


    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:1|max:9999',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Hitung total nilai

        // Update data penyimpanan
        $data->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
{
    // Ambil data penyimpanan berdasarkan ID
    $data = Data::findOrFail($id);

    // Hapus data penyimpanan
    $data->delete();

    // Redirect ke daftar data penyimpanan dengan pesan sukses
    return redirect()->route('admin.data.index')->with('success', 'Data penyimpanan berhasil dihapus');
}


}
