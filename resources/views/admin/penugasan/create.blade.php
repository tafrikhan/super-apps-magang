@extends('admin.layouts.app')

@section('title', 'Tambah Penugasan')

@section('content')
<div class="container">
    <h2>Tambah Penugasan</h2>
    <form action="{{ route('penugasan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_unit_bisnis">Nama Unit Bisnis</label>
            <input type="text" name="nama_unit_bisnis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penugasan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
