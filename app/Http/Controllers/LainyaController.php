<?php

namespace App\Http\Controllers;

use App\Models\Lainya;
use Illuminate\Http\Request;

class LainyaController extends Controller
{
    // Menampilkan semua data penyimpanan
    public function index()
    {
        // Ambil semua data penyimpanan
        $lainya = Lainya::where('kategori', 'Lainya')->get();
        return view('admin.data.kategori.lainya.index', compact('lainya'));
    }

    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        // Tampilkan form tambah data penyimpanan
        return view('admin.data.kategori.lainya.create');
    }

    // Menampilkan form edit data penyimpanan
    public function edit($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $lainya = Lainya::findOrFail($id);

        // Mengirimkan data penyimpanan ke view
        return view('admin.data.kategori.lainya.edit', compact('lainya'));
    }

    // Menyimpan data penyimpanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Simpan data penyimpanan baru
        lainya::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('lainya.index')->with('success', 'Data berhasil disimpan');
    }

    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);

        // Ambil data penyimpanan berdasarkan ID
        $lainya = Lainya::findOrFail($id);

        // Update data penyimpanan
        $lainya->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('lainya.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $lainya = Lainya::findOrFail($id);

        // Hapus data penyimpanan
        $lainya->delete();

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('lainya.index')->with('success', 'Data penyimpanan berhasil dihapus');
    }
}
