{{-- resources/views/mentors/index.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mentor</h1>
    <a href="{{ route('mentors.create') }}" class="btn btn-primary mb-3">Tambah Mentor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mentors as $mentor)
                <tr>
                    <td>{{ $mentor->id }}</td>
                    <td>{{ $mentor->name }}</td>
                    <td>{{ $mentor->email }}</td>
                    <td>{{ $mentor->nik }}</td>
                    <td>{{ $mentor->jabatan }}</td>
                    <td>
                        <a href="{{ route('mentors.edit', $mentor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" style="display:inline;">
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
