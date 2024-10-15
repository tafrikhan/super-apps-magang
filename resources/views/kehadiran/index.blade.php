@extends('layouts.app')

@section('title', 'Absensi')

@section('header')
    Absensi
@endsection

@section('content')
<div class="container my-5 mx-auto">
    <h1 class="mb-4 text-center">Absensi</h1>

    <div class="alert alert-info text-center">
        <strong>Nama:</strong> {{ Auth::user()->name }}
    </div>

    <form action="{{ route('kehadirans.checkin') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="shift" class="form-label">Shift:</label>
                <select name="shift" id="shift" class="form-select" required>
                    <option value="pagi">Pagi</option>
                    <option value="sore">Sore</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" name="location" id="location" class="form-control" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label for="current-time" class="form-label">Waktu Saat Ini (WIB):</label>
            <input type="text" id="current-time" class="form-control" value="" readonly>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">Absen Masuk</button>
    </form>

    <hr>

    <h2 class="text-center mb-4">Riwayat Absen</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
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
                <tr class="text-center">
                    <td>{{ $kehadiran->user->name }}</td>
                    <td>{{ $kehadiran->date }}</td>
                    <td>{{ $kehadiran->shift }}</td>
                    <td>{{ $kehadiran->check_in ? $kehadiran->check_in->format('H:i') : '-' }}</td> <!-- Menampilkan jam masuk -->
                    <td>{{ $kehadiran->check_out ? $kehadiran->check_out->format('H:i') : '-' }}</td> <!-- Menampilkan jam pulang -->
                    <td>{{ $kehadiran->location }}</td>
                    <td>
                        @if (!$kehadiran->check_out)
                        <form action="{{ route('kehadirans.checkout', $kehadiran->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="text" name="location" id="checkout-location" class="form-control" readonly required>
                            <button type="submit" class="btn btn-danger mt-2 w-100">Absen Pulang</button>
                        </form>
                        @else
                        <span class="badge bg-success">Sudah Pulang</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            
            
        </table>
    </div>
</div>

<script>
    // Mendapatkan lokasi secara otomatis
    function getLocation(inputId) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                document.getElementById(inputId).value = `${latitude}, ${longitude}`;
            }, function(error) {
                alert('Gagal mendapatkan lokasi. Periksa pengaturan izin lokasi.');
            });
        } else {
            alert('Geolocation tidak didukung di browser ini.');
        }
    }

    // Mendapatkan waktu lokal sesuai WIB
    function getWIBTime() {
        const options = {
            timeZone: 'Asia/Jakarta', // Zona waktu untuk WIB
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false // Format 24 jam
        };
        const now = new Date().toLocaleString('id-ID', options); // Menggunakan format lokal Indonesia
        return now;
    }

    // Panggil fungsi saat halaman dimuat untuk input absen masuk
    window.onload = function() {
        getLocation('location'); // Untuk absen masuk

        // Mengisi input dengan waktu saat ini
        document.getElementById('current-time').value = getWIBTime();
    };

    // Dapatkan lokasi otomatis saat checkout jika tombol checkout ada
    document.addEventListener('DOMContentLoaded', function() {
        const checkoutInput = document.getElementById('checkout-location');
        if (checkoutInput) {
            getLocation('checkout-location'); // Untuk absen pulang
        }
    });
</script>
@endsection
