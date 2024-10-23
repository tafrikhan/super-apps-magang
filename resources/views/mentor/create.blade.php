
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mentor</h1>
    <form action="{{ route('mentors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik">
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" name="jabatan">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mentor.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
