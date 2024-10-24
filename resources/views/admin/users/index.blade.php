@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="container py-5" style="background-color: white; border-radius: 8px;">
        <h2 class="mb-4">Daftar Manajemen Pengguna</h2>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Pengguna Baru
            </a>
        </div>

        <div class="table-responsive">


            <!-- Tabel Data -->
            <table id="userTable" class="table table-bordered table-hover display nowrap" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Instansi</th>
                        <th>Penugasan</th>
                        <th>Mentor</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->instansi ? $user->instansi->nama_instansi : 'N/A' }}</td>
                            <!-- Menampilkan nama instansi -->
                            <td>{{ $user->penugasan ? $user->penugasan->nama_unit_bisnis : 'N/A' }}</td>
                            <!-- Menampilkan nama penugasan -->
                            <td>{{ $user->mentor ? $user->mentor->nama : 'N/A' }}</td> <!-- Menampilkan nama mentor -->
                            <td>{{ $user->start_date }}</td> <!-- Menampilkan tanggal mulai magang -->
                            <td>{{ $user->end_date }}</td> <!-- Menampilkan tanggal selesai magang -->
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CSS dan JS DataTables + DateTime -->
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.4/css/dataTables.dateTime.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .container {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .table-hover tbody tr:hover {
                background-color: #f1f1f1;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.5.4/js/dataTables.dateTime.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            let minDate, maxDate;

            // Initialize the DataTable
            $(document).ready(function() {
                // Inisialisasi DateTime Picker
                minDate = new DateTime('#min', {
                    format: 'YYYY-MM-DD'
                });
                maxDate = new DateTime('#max', {
                    format: 'YYYY-MM-DD'
                });

                // Inisialisasi DataTables
                let table = $('#userTable').DataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [5, 6],
                        render: $.fn.dataTable.render.moment('YYYY-MM-DD')
                    }]
                });

                // Custom filtering function which will search data in column five between two values
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    let min = minDate.date() ? minDate.date().toISOString() : null;
                    let max = maxDate.date() ? maxDate.date().toISOString() : null;
                    let date = new Date(data[5]); // Adjust index if necessary

                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                });

                // Refilter the table on change
                $('#min, #max').on('change', function() {
                    table.draw();
                });

                // Custom search functionality for specific columns
                $('#search').on('keyup', function() {
                    let searchTerm = $(this).val();

                    $.ajax({
                        url: '{{ route('admin.users.search') }}',
                        type: 'GET',
                        data: {
                            query: searchTerm
                        },
                        success: function(data) {
                            let tableBody = '';
                            $.each(data, function(index, user) {
                                tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${user.email}</td>
                                <td>${user.gender.charAt(0).toUpperCase() + user.gender.slice(1)}</td>
                                <td>${user.school}</td>
                                <td>${user.address}</td>
                                <td>${user.internship_start}</td>
                                <td>${user.internship_end}</td>
                                <td>
                                    <a href="/admin/users/${user.id}/edit" class="btn btn-warning btn-sm mb-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form method="POST" action="/admin/users/${user.id}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        `;
                            });
                            $('#userTable tbody').html(tableBody);
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection
