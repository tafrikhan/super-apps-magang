@extends('admin.layouts.app')

@section('title', 'Daftar Penugasan')

@section('content')
<div class="container">
    <h2>Daftar Penugasan</h2>
    <a href="{{ route('penugasan.create') }}" class="btn btn-primary mb-3">Tambah Penugasan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Unit Bisnis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penugasans as $penugasan)
            <tr>
                <td>{{ $penugasan->id }}</td>
                <td>{{ $penugasan->nama_unit_bisnis }}</td>
                <td>
                    <a href="{{ route('penugasan.edit', $penugasan) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penugasan.destroy', $penugasan) }}" method="POST" class="d-inline">
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
