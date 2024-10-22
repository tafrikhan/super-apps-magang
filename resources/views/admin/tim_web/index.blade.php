@extends('admin.layouts.app')

@section('title', 'Data Tim Web')

@section('content')
<div class="container">
    <h2>Data Tim Web</h2>
    
    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tambahkan link untuk menambah Tim baru -->
    <a href="{{ route('tim_web.create') }}" class="btn btn-primary mb-3">Tambah Tim</a>

    <!-- Menampilkan jumlah artikel dan kata hari ini -->
    <div class="mb-3">
        <p><strong>Jumlah Artikel Hari Ini:</strong> {{ $jumlahArtikelHariIni }}</p>
        <p><strong>Total Kata Hari Ini:</strong> {{ $totalKataHariIni }}</p>
    </div>

    <!-- Tabel Tim Web -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Tim</th>
                <th>Jumlah Artikel</th>
                <th>Jumlah Kata</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timwebs as $timweb)
            <tr>
                <td>{{ $timweb->nama_tim }}</td>
                <td>{{ $timweb->jumlah_artikel }}</td>
                <td>{{ $timweb->jumlah_kata }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('tim_web.edit', $timweb->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Tombol Hapus -->
                    <form action="{{ route('tim_web.destroy', $timweb->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tim ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
