@extends('main')

@section('content')
    <h2>Edit Data</h2>
    <form action="{{ route('data.update', $data->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nama" value="{{ $data->nama }}">
        <input type="text" name="kelas" value="{{ $data->kelas }}">
        <input type="text" name="jurusan" value="{{ $data->jurusan }}">
        <button type="submit">Update</button>
    </form>
@endsection
