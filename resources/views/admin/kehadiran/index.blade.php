@extends('admin.layouts.app')

@section('title', 'Absensi')

@section('header')
    Absensi
@endsection

@section('content')
<body class="font-sans antialiased">
    <div class="container mt-4">
        <h1 class="mb-4">Riwayat Absensi Pengguna</h1>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="min-date" class="form-label">Tanggal Mulai:</label>
                <input type="date" id="min-date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="max-date" class="form-label">Tanggal Akhir:</label>
                <input type="date" id="max-date" class="form-control">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Daftar Absensi</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="attendance-table" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Shift</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehadirans as $kehadiran)
                        <tr>
                            <td class="p-3">{{ $kehadiran->user->name }}</td>
                            <td class="p-3">{{ $kehadiran->date }}</td>
                            <td class="p-3">{{ $kehadiran->shift }}</td>
                            <td class="p-3">{{ $kehadiran->check_in ?? '-' }}</td>
                            <td class="p-3">{{ $kehadiran->check_out ?? '-' }}</td>
                            <td class="p-3">{{ $kehadiran->location }}</td>
                            <td class="p-3">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css">
    
    <script>
        $(document).ready(function () {
            var table = $('#attendance-table').DataTable();

            var minDate, maxDate;

            $('#min-date, #max-date').on('change', function () {
                minDate = $('#min-date').val();
                maxDate = $('#max-date').val();
                table.draw();
            });

            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                var date = data[1];
                if (
                    (minDate === null || minDate === '' || date >= minDate) &&
                    (maxDate === null || maxDate === '' || date <= maxDate)
                ) {
                    return true;
                }
                return false;
            });
        });
    </script>

    <style>
        .dataTables_filter {
            display: flex;
            align-items: center;
        }

        .dataTables_filter label {
            margin-right: 10px;
        }

        .dataTables_filter input {
            margin-left: 5px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .dataTables_filter input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Gaya untuk elemen lainnya */
        .dataTables_length, .dataTables_info, .dataTables_paginate {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .dataTables_length label,
        .dataTables_info {
            margin-right: 10px;
        }

        .dataTables_length select {
            margin-left: 5px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .dataTables_paginate {
            margin-top: 10px;
        }

        .dataTables_paginate .paginate_button {
            margin: 0 2px;
            padding: 10px; 
            border-radius: 5px;
            border: 1px solid #007bff;
            background-color: #fff;
            color: #007bff;
        }

        .dataTables_paginate .paginate_button.current {
            background-color: #007bff;
            color: white;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</body>
@endsection
