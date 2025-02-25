<?php

namespace App\Http\Controllers;

use App\Models\Kesehatandankebersihan;
use Illuminate\Http\Request;

class KesehatandankebersihanController extends Controller
{
    // Menampilkan semua data penyimpanan
    public function index()
    {
        // Ambil semua data penyimpanan
        $kesehatandankebersihan = Data::where('kategori', 'Kesehatan dan Kebersihan')->get();
        return view('admin.data.kategori.kesehatandankebersihan.index', compact('kesehatandankebersihan'));

    }
    // Menampilkan form untuk menambah data penyimpanan
    public function create()
    {
        // Tampilkan form tambah data penyimpanan
        return view('admin.data.kategori.kesehatandankebersihan.create');
    }

    // Menampilkan form edit data penyimpanan
    public function edit($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Mengirimkan data penyimpanan ke viewx
        $kesehatandankebersihan = Data::findOrFail($id);
        return view('admin.data.kategori.kesehatandankebersihan.edit', compact('kesehatandankebersihan'));

    }

    // Menyimpan data penyimpanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1|max:9999',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);   

        // Hitung total nilai

        // Simpan data penyimpanan baru
        Data::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data berhasil disimpan');

    }

    // Menyimpan perubahan data penyimpanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_pokok' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'lokasi_penyimpanan' => 'required|string',
        ]);
        

        // Ambil data penyimpanan berdasarkan ID
        $kesehatandankebersihan = Kesehatandankebersihan::findOrFail($id);

        // Hitung total nilai

        // Update data penyimpanan
        $kesehatandankebersihan->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
        ]);

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data penyimpanan berhasil diperbarui');
    }

    // Menghapus data penyimpanan
    public function destroy($id)
    {
        // Ambil data penyimpanan berdasarkan ID
        $data = Data::findOrFail($id);

        // Hapus data penyimpanan
        $data->delete();

        // Redirect ke daftar data penyimpanan dengan pesan sukses
        return redirect()->route('admin.data.kategori.kesehatandankebersihan.index')->with('success', 'Data penyimpanan berhasil dihapus');
    }

    
}
