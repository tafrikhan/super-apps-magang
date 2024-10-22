<?php

namespace App\Http\Controllers\Admin;

use App\Models\PengajuanIzin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PengajuanIzinUserController extends Controller
{
// app/Http/Controllers/PengajuanIzinController.php

    public function index(Request $request)
    {
        // Ambil input status dan tanggal dari request
        $status = $request->get('status');
        $tanggalMulai = $request->get('tanggal_mulai');
        $tanggalSelesai = $request->get('tanggal_selesai');

        // Konversi tanggal dari input (jika ada)
        $tanggalMulai = $tanggalMulai ? Carbon::parse($tanggalMulai)->startOfDay() : null;
        $tanggalSelesai = $tanggalSelesai ? Carbon::parse($tanggalSelesai)->endOfDay() : null;

        // Query data izin dengan filter dinamis
        $pengajuan = PengajuanIzin::with('user')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($tanggalMulai && $tanggalSelesai, function ($query) use ($tanggalMulai, $tanggalSelesai) {
                return $query->whereBetween('tanggal_mulai', [$tanggalMulai, $tanggalSelesai]);
            })
            ->get();

        return view('admin.pengajuan_izin.index', compact('pengajuan'));
    }




    public function approve(PengajuanIzin $pengajuanIzin)
    {
        $pengajuanIzin->status = 'disetujui';
        $pengajuanIzin->save();

        return redirect()->back()->with('success', 'Pengajuan izin berhasil disetujui.');
    }

    public function reject(PengajuanIzin $pengajuanIzin)
    {
        $pengajuanIzin->status = 'ditolak';
        $pengajuanIzin->save();

        return redirect()->back()->with('success', 'Pengajuan izin berhasil ditolak.');
    }
}
