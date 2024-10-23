@extends('admin.layouts.app')

@section('title', 'Daftar Tim Web')

@section('content')
<div class="container">
    <h2>Data Tim Web</h2>

    <!-- Tampilkan jumlah artikel dan jumlah kata hari ini -->
    <div class="alert alert-info">
        <strong>Jumlah Artikel Hari Ini:</strong> {{ $jumlahArtikel }} <br>
        <strong>Jumlah Kata Hari Ini:</strong> {{ $jumlahKata }}
    </div>

    <!-- Tombol tambah data -->
    <a href="{{ route('tim_web.create') }}" class="btn btn-primary mb-3">Tambah Data Tim Web</a>
    
    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel daftar tim web -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah Artikel Hari Ini</th>
                <th>Jumlah Kata Hari Ini</th>
                <th>Keterangan</th>
                <th>Tanggal</th> <!-- Tambahkan kolom tanggal -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tim_webs as $tim_web)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tim_web->jumlah_artikel }}</td>
                <td>{{ $tim_web->jumlah_kata }}</td>
                <td>{{ $tim_web->keterangan }}</td>
                <td>{{ $tim_web->tanggal }}</td> <!-- Tampilkan data tanggal -->
                <td>
                    <a href="{{ route('tim_web.edit', $tim_web->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tim_web.destroy', $tim_web->id) }}" method="POST" class="d-inline">
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
