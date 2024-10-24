@extends('admin.layouts.app')

@section('title', 'Daftar Instansi')

@section('content')
<div class="container">
    <h2>Daftar Instansi</h2>
    <a href="{{ route('instansi.create') }}" class="btn btn-primary mb-3">Tambah Instansi</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Instansi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instansis as $instansi)
            <tr>
                <td>{{ $instansi->id }}</td>
                <td>{{ $instansi->nama_instansi }}</td>
                <td>
                    <a href="{{ route('instansi.edit', $instansi) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('instansi.destroy', $instansi) }}" method="POST" class="d-inline">
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
