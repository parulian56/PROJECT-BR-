@extends('layout.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    
    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->nama_produk }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>Rp {{ number_format($transaksi->harga) }}</td>
                <td>Rp {{ number_format($transaksi->total_harga) }}</td>
                <td>Rp {{ number_format($transaksi->bayar) }}</td>
                <td>Rp {{ number_format($transaksi->kembalian) }}</td>
                <td>
                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
