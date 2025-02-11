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
        $datas = Data::all();

        // Kirim data penyimpanan ke tampilan
        return view('data.index', compact('datas'));
    }

    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        // Tampilkan form tambah data penyimpanan
        return view('data.create');
    }

    // Menampilkan form edit data penyimpanan
    public function edit($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Mengirimkan data penyimpanan ke view
        return view('data.edit', compact('data'));
    }

    // Menyimpan data penyimpanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Hitung total nilai
        $total_nilai = $request->jumlah * $request->harga_satuan;

        // Simpan data penyimpanan baru
        Data::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_nilai' => $total_nilai,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil disimpan');
    }

    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Hitung total nilai
        $total_nilai = $request->jumlah * $request->harga_satuan;

        // Update data penyimpanan
        $data->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_nilai' => $total_nilai,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Hapus data penyimpanan
        $data->delete();

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil dihapus');
    }

    
}