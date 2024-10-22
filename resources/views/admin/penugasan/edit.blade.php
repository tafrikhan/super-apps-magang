@extends('admin.layouts.app')

@section('title', 'Edit Penugasan')

@section('content')
<div class="container">
    <h2>Edit Penugasan</h2>
    <form action="{{ route('penugasan.update', $penugasans) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_unit_bisnis" class="form-label">Nama Unit Bisnis:</label>
            <input type="text" id="nama_unit_bisnis" name="nama_unit_bisnis" class="form-control" value="{{ $penugasan->nama_unit_bisnis }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('penugasan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
