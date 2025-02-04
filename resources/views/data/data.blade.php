@extends('layout')

@section('content')
    <h2>Daftar Data</h2>
    <a href="{{ route('data.create') }}">Tambah Data</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($data as $item)
            <li>{{ $item->title }} - 
                <a href="{{ route('data.edit', $item->id) }}">Edit</a>
                <form action="{{ route('data.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
