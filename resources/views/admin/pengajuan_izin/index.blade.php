@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Kelola Pengajuan Izin</h2>

    {{-- Filter Status dan Tanggal --}}
    <form method="GET" action="{{ route('admin.pengajuan_izin.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" 
                       value="{{ request('tanggal_mulai') }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" 
                       value="{{ request('tanggal_selesai') }}">
            </div>
            <div class="col-md-2">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>
    

    <div class="table-responsive">
        <table id="pengajuanIzinTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Jenis Izin</th>
                    <th>Durasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan as $izin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($izin->user)->name ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $izin->jenis_izin }}</td>
                        <td>{{ $izin->durasi }}</td>
                        <td>{{ $izin->tanggal_mulai }}</td>
                        <td>{{ $izin->tanggal_selesai ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $izin->status == 'menunggu' ? 'warning' : ($izin->status == 'disetujui' ? 'success' : 'danger') }}">
                                {{ ucfirst($izin->status) }}
                            </span>
                        </td>
                        <td>
                            @if ($izin->status == 'menunggu')
                                <form action="{{ route('admin.pengajuan_izin.approve', $izin) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <form action="{{ route('admin.pengajuan_izin.reject', $izin) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            @else
                                <span>Tindakan selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada pengajuan izin ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


