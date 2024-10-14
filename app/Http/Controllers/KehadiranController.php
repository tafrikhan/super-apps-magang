<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadirans = Kehadiran::with('user')
            ->where('user_id', Auth::id())
            ->orderBy('date', 'desc') // Urutkan berdasarkan tanggal terbaru
            ->get();
    
        return view('kehadiran.index', compact('kehadirans'));
    }

    public function adminIndex()
    {
        // Mengambil semua kehadiran dari database
        $kehadirans = Kehadiran::with('user')->get(); // Mengambil relasi user untuk mendapatkan nama

        return view('admin.kehadiran.index', compact('kehadirans')); // Ganti 'admin.kehadiran.index' sesuai dengan view Anda
    }

    public function checkIn(Request $request)
    {
        $kehadirans = Kehadiran::create([
            'user_id' => Auth::id(),
            'shift' => $request->shift, // 'pagi' atau 'sore'
            'date' => now()->toDateString(),
            'check_in' => now()->toTimeString(),
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Berhasil absen masuk!');
    }

    public function checkOut(Request $request, $id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update([
            'check_out' => now()->toTimeString(),
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Berhasil absen pulang!');
    }
}
