<div class="container">
          <h1>Riwayat Absensi - Admin</h1>
      
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Nama Pengguna</th>
                      <th>Tanggal</th>
                      <th>Shift</th>
                      <th>Masuk</th>
                      <th>Pulang</th>
                      <th>Lokasi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($kehadirans as $kehadiran)
                      <tr>
                          <td>{{ $kehadiran->user->name }}</td> <!-- Nama Pengguna -->
                          <td>{{ $kehadiran->date }}</td>
                          <td>{{ $kehadiran->shift }}</td>
                          <td>{{ $kehadiran->check_in ?? '-' }}</td>
                          <td>{{ $kehadiran->check_out ?? '-' }}</td>
                          <td>{{ $kehadiran->location }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>