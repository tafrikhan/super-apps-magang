@extends('admin.layouts.app')

@section('title', 'Tambah Tim Web')

@section('content')
<div class="container">
    <h2>Tambah Data Tim Web</h2>

    <!-- Form Tambah Tim Web -->
    <form action="{{ route('tim_web.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="jumlah_artikel" class="form-label">Jumlah Artikel</label>
            <input type="number" name="jumlah_artikel" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_kata" class="form-label">Jumlah Kata</label>
            <input type="number" name="jumlah_kata" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tim_web.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
