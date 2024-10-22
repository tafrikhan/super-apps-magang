@extends('admin.layouts.app')

@section('title', 'Edit Instansi')

@section('content')
<div class="container">
    <h2>Edit Instansi</h2>
    <form action="{{ route('instansi.update', $instansi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_instansi" class="form-label">Nama Instansi:</label>
            <input type="text" id="nama_instansi" name="nama_instansi" value="{{ $instansi->nama_instansi }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('instansi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
