@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Mentor</h1>
        <form action="{{ route('mentors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-control" name="jabatan" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Manajer">Manajer</option>
                    <option value="SPV">SPV</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
