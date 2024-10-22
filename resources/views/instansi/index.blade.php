@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Instansi</h1>

        <a href="{{ route('instansi.create') }}" class="btn btn-primary mb-3">Tambah Instansi</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Instansi</th>
                <th>Aksi</th>
            </tr>
            @foreach ($instansis as $instansi)
                <tr>
                    <td>{{ $instansi->id }}</td>
                    <td>{{ $instansi->nama_instansi }}</td>
                    <td>
                        <a href="{{ route('instansi.edit', $instansi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('instansi.destroy', $instansi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus instansi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
