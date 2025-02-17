<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Menampilkan semua data penyimpanan
    public function index()
    {
        $datas = Data::all();
        return view('data.index', compact('datas'));
    }

    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        return view('data.create');
    }

    // Menampilkan form edit data penyimpanan
    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return view('data.edit', compact('data'));
    }

    // Menyimpan data penyimpanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_satuan' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Hitung total nilai
        $total_nilai =$jumlah*$harga_satuan;

        // Simpan data penyimpanan baru
        Data::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_nilai' => $total_nilai,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil disimpan');
    }

    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'deskripsi' => 'nullable|string',
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
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_nilai' => $total_nilai,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect()->route('data.index')->with('success', 'Data penyimpanan berhasil dihapus');
    }
}
