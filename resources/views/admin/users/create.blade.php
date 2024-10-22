@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="container">
        <h1>Create User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Dropdown Nama Instansi -->
            <div class="mb-3">
                <label for="instansi" class="form-label">Nama Instansi</label>
                <select class="form-control select2" id="instansi" name="instansi" required>
                    <option value="SMK 2 Magelang">SMK 2 Magelang</option>
                    <option value="SMK 3 Bantul">SMK 3 Bantul</option>
                    <option value="Universitas Amikom Yogyakarta">Universitas Amikom Yogyakarta</option>
                </select>
            </div>

            <!-- Dropdown Penugasan -->
            <div class="mb-3">
                <label for="penugasan" class="form-label">Penugasan</label>
                <select class="form-control select2" id="penugasan" name="penugasan" required>
                    <option value="Jacoid">Jacoid</option>
                    <option value="Punca Apparel">Punca Apparel</option>
                    <option value="Rumah Sabut">Rumah Sabut</option>
                </select>
            </div>


            <!-- Dropdown Mentor -->
            <div class="mb-3">
                <label for="mentor" class="form-label">Mentor</label>
                <select class="form-control select2" id="mentor" name="mentor" required>
                    <option value="Supri">Supri</option>
                    <option value="Ahmad">Ahmad</option>
                    <option value="Budi">Budi</option>
                </select>
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <!-- Tanggal Selesai -->
            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <!-- Password Autofill -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="rumahmesin" readonly>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    value="rumahmesin" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

@section('scripts')
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select2').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select2').select2({
                placeholder: "Pilih Penugasan", // Placeholder jika ingin ditambahkan
                allowClear: true // Memungkinkan user untuk menghapus pilihan
            });
        });
    </script>
@endsection
