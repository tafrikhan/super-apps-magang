@extends('admin.layouts.app')

@section('title', 'Tambah Instansi')

@section('content')
<div class="container">
    <h2>Tambah Instansi</h2>
    <form action="{{ route('instansi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_instansi" class="form-label">Nama Instansi:</label>
            <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('instansi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
