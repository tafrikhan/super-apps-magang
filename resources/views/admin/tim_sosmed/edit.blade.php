@extends('admin.layouts.app')

@section('title', 'Edit Tim Sosmed')

@section('content')
<div class="container">
    <h2>Edit Data Tim Sosmed</h2>

    <form action="{{ route('tim_sosmed.update', $tim_sosmed->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pekerjaan_hari_ini">Pekerjaan Hari Ini</label>
            <input type="text" class="form-control" id="pekerjaan_hari_ini" name="pekerjaan_hari_ini" value="{{ $tim_sosmed->pekerjaan_hari_ini }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $tim_sosmed->keterangan }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tim_sosmed->tanggal }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('tim_sosmed.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
