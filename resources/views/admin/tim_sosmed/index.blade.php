@extends('admin.layouts.app')

@section('title', 'Daftar Tim Sosmed')

@section('content')
<div class="container">
    <h2>Data Tim Sosmed</h2>

    <!-- Tombol tambah data -->
    <a href="{{ route('tim_sosmed.create') }}" class="btn btn-primary mb-3">Tambah Data Tim Sosmed</a>
    
    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel daftar tim sosmed -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pekerjaan Hari Ini</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tim_sosmeds as $tim_sosmed)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tim_sosmed->pekerjaan_hari_ini }}</td>
                <td>{{ $tim_sosmed->keterangan }}</td>
                <td>{{ $tim_sosmed->tanggal }}</td>
                <td>
                    <a href="{{ route('tim_sosmed.edit', $tim_sosmed->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tim_sosmed.destroy', $tim_sosmed->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
