@extends('admin.layouts.app')

@section('content')
    <h1>Edit Tim Web</h1>

    <form action="{{ route('tim_web.update', $timweb->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Tim:</label>
        <input type="text" name="nama_tim" value="{{ $timweb->nama_tim }}" required>

        <label>Jumlah Artikel:</label>
        <input type="number" name="jumlah_artikel" value="{{ $timweb->jumlah_artikel }}" required>

        <label>Jumlah Kata:</label>
        <input type="number" name="jumlah_kata" value="{{ $timweb->jumlah_kata }}" required>

        <button type="submit">Perbarui</button>
    </form>
@endsection
