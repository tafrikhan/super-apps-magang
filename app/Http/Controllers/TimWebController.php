<?php

namespace App\Http\Controllers;

use App\Models\TimWeb;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimWebController extends Controller
{
    public function index()
    {
        // Menghitung jumlah artikel hari ini
        $jumlahArtikel = TimWeb::whereDate('created_at', Carbon::today())->sum('jumlah_artikel');
        
        // Menghitung jumlah kata hari ini
        $jumlahKata = TimWeb::whereDate('created_at', Carbon::today())->sum('jumlah_kata');

        // Mengambil semua data TimWeb
        $tim_webs = TimWeb::all();

        // Kirimkan variabel ke view
        return view('admin.tim_web.index', compact('tim_webs', 'jumlahArtikel', 'jumlahKata'));
    }

    public function create()
    {
        return view('admin.tim_web.create');
    }

    public function store(Request $request)
    {
        // Validasi data termasuk kolom tanggal
        $request->validate([
            'jumlah_artikel' => 'required|integer',
            'jumlah_kata' => 'required|integer',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date', // Tambahkan validasi tanggal
        ]);

        // Simpan data ke database
        TimWeb::create($request->all());

        return redirect()->route('tim_web.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(TimWeb $tim_web)
    {
        return view('admin.tim_web.edit', compact('tim_web'));
    }

    public function update(Request $request, TimWeb $tim_web)
    {
        // Validasi data termasuk kolom tanggal
        $request->validate([
            'jumlah_artikel' => 'required|integer',
            'jumlah_kata' => 'required|integer',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date', // Tambahkan validasi tanggal
        ]);

        // Update data di database
        $tim_web->update($request->all());

        return redirect()->route('tim_web.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(TimWeb $tim_web)
    {
        // Hapus data
        $tim_web->delete();

        return redirect()->route('tim_web.index')->with('success', 'Data berhasil dihapus!');
    }
}
