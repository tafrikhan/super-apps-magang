@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Mentor</h1>
        <a href="{{ route('mentors.create') }}" class="btn btn-primary">Tambah Mentor</a>
        <table class="table">
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
                            <a href="{{ route('mentors.edit', $mentor) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('mentors.destroy', $mentor) }}" method="POST" style="display:inline;">
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
