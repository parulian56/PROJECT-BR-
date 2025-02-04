@extends('layout')

@section('content')
    <h2>Edit Data</h2>
    <form action="{{ route('data.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $data->title }}" required>
        <textarea name="content">{{ $data->content }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
