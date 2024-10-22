@extends('admin.layouts.app')

@section('title', 'Tambah Tim Web')

@section('content')
<div class="container">
    <h2>Tambah Tim Web</h2>

    <!-- Form Tambah Tim Web -->
    <form action="{{ route('tim_web.store') }}" method="POST">
        @csrf

        <!-- Nama Tim -->
        <div class="mb-3">
            <label for="nama_tim" class="form-label">Nama Tim:</label>
            <input type="text" id="nama_tim" name="nama_tim" class="form-control" required>
        </div>

        <!-- Jumlah Artikel -->
        <div class="mb-3">
            <label for="jumlah_artikel" class="form-label">Jumlah Artikel:</label>
            <input type="number" id="jumlah_artikel" name="jumlah_artikel" class="form-control" required>
        </div>

        <!-- Jumlah Kata -->
        <div class="mb-3">
            <label for="jumlah_kata" class="form-label">Jumlah Kata:</label>
            <input type="number" id="jumlah_kata" name="jumlah_kata" class="form-control" required>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tim_web.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
