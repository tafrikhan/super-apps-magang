@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Mentor</h1>
        <form action="{{ route('mentors.update', $mentor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ $mentor->nik }}" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $mentor->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-control" name="jabatan" required>
                    <option value="Manajer" {{ $mentor->jabatan == 'Manajer' ? 'selected' : '' }}>Manajer</option>
                    <option value="SPV" {{ $mentor->jabatan == 'SPV' ? 'selected' : '' }}>SPV</option>
                    <option value="Staff" {{ $mentor->jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
