@extends('admin.layouts.app')

@section('title', 'Absensi')

@section('content')

<div class="container">
    <h2>Edit Mentor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mentors.update', $mentor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ $mentor->nik }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mentor->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Manajer" {{ $mentor->jabatan == 'Manajer' ? 'selected' : '' }}>Manajer</option>
                <option value="SPV" {{ $mentor->jabatan == 'SPV' ? 'selected' : '' }}>SPV</option>
                <option value="Staff" {{ $mentor->jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
