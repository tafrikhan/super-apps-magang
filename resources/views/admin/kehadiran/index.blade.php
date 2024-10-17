@extends('admin.layouts.app')

@section('title', 'Riwayat Absensi User')

@section('content')
<div class="container mt-4">
    <h1>Riwayat Absensi User</h1>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" id="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">Tanggal Akhir</label>
            <input type="date" id="end_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="shift_filter" class="form-label">Shift</label>
            <select id="shift_filter" class="form-select">
                <option value="">Semua Shift</option>
                <option value="pagi">Pagi</option>
                <option value="sore">Sore</option>
            </select>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table" id="attendanceTable">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Tanggal</th>
                        <th>Shift</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($kehadirans as $kehadiran)
                        <tr>
                            <td>{{ $kehadiran->user->name }}</td>
                            <td>{{ $kehadiran->date }}</td>
                            <td>{{ $kehadiran->shift }}</td>
                            <td>{{ $kehadiran->check_in ?? '-' }}</td>
                            <td>{{ $kehadiran->check_out ?? '-' }}</td>
                            <td>{{ $kehadiran->location }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('kehadirans.destroy', $kehadiran->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                <i class="bx bx-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        var table = $('#attendanceTable').DataTable({
            "order": [[1, 'desc']],
            "responsive": true
        });

        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var minDate = $('#start_date').val();
            var maxDate = $('#end_date').val();
            var shift = $('#shift_filter').val();
            var rowDate = data[1];
            var rowShift = data[2];

            var withinDateRange = 
                (minDate === '' || rowDate >= minDate) &&
                (maxDate === '' || rowDate <= maxDate);

            var matchesShift = (shift === '' || rowShift === shift);

            return withinDateRange && matchesShift;
        });

        $('#start_date, #end_date, #shift_filter').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection
