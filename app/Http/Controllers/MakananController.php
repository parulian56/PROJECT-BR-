    <?php

    namespace App\Http\Controllers;

    use App\Models\Makanan;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

    class MakananController extends Controller
    {
        public function index()
        {
            $makanan = Makanan::where('kategori', 'makanan')->paginate(10);
            return view('admin.data.kategori.makanan.index', compact('makanan'));
        }

        public function create()
        {
            return view('admin.data.kategori.makanan.create');
        }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|in:makanan',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga_pokok' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
            'lokasi_penyimpanan' => 'required|string|max:100',
        ]);

        try {
            Makanan::create($validated);
            return redirect()->route('admin.data.kategori.makanan.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error storing makanan: '.$e->getMessage());
            return back()->with('error', 'Gagal menyimpan data')->withInput();
        }
    }


        public function edit($id)
        {
            $makanan = Makanan::findOrFail($id);
            return view('admin.data.kategori.makanan.edit', compact('makanan'));
        }

        public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'nama_barang' => 'required|string|max:255',
                'kategori' => 'required|string|in:makanan',
                'deskripsi' => 'nullable|string',
                'jumlah' => 'required|integer|min:1',
                'harga_pokok' => 'required|numeric|min:0',
                'harga_jual' => 'required|numeric|min:0|gt:harga_pokok',
                'lokasi_penyimpanan' => 'required|string|max:100',
            ]);

            try {
                $makanan = Makanan::findOrFail($id);
                $makanan->update($validated);
                return redirect()->route('admin.data.kategori.makanan.index')->with('success', 'Data berhasil diperbarui!');
            } catch (\Exception $e) {
                Log::error('Error updating makanan: '.$e->getMessage());
                return back()->with('error', 'Gagal memperbarui data')->withInput();
            }
        }

        public function destroy($id)
        {
            try {
                $makanan = Makanan::findOrFail($id);
                $makanan->delete();
                return redirect()->route('admin.data.kategori.makanan.index')->with('success', 'Data berhasil dihapus!');
            } catch (\Exception $e) {
                Log::error('Error deleting makanan: '.$e->getMessage());
                return back()->with('error', 'Gagal menghapus data');
            }
        }
    }
