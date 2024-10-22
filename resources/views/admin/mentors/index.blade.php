@extends('admin.layouts.app')

@section('title', 'Absensi')

@section('content')
<div class="container">
    <h2>Daftar Mentor</h2>
    <a href="{{ route('mentors.create') }}" class="btn btn-primary mb-3">Tambah Mentor</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mentors as $mentor)
            <tr>
                <td>{{ $mentor->nik }}</td>
                <td>{{ $mentor->nama }}</td>
                <td>{{ $mentor->jabatan }}</td>
                <td>
                    <a href="{{ route('mentors.edit', $mentor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
