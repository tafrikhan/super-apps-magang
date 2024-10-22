<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimWeb;
use Illuminate\Http\Request;

class TimWebController extends Controller
{
    public function index()
    {
        // Menghitung jumlah artikel hari ini dan total kata
        $timwebs = TimWeb::all();
        $jumlahArtikelHariIni = TimWeb::whereDate('created_at', now()->format('Y-m-d'))->count();
        $totalKataHariIni = TimWeb::whereDate('created_at', now()->format('Y-m-d'))->sum('jumlah_kata');
        
        return view('admin.tim_web.index', compact('timwebs', 'jumlahArtikelHariIni', 'totalKataHariIni'));
    }

    public function create()
    {
        return view('admin.tim_web.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'jumlah_artikel' => 'required|integer',
            'jumlah_kata' => 'required|integer',
        ]);

        TimWeb::create($request->all());

        return redirect()->route('tim_web.index')
            ->with('success', 'Tim Web berhasil ditambahkan.');
    }

    public function edit(TimWeb $timweb)
    {
        return view('admin.tim_web.edit', compact('timweb'));
    }

    public function update(Request $request, TimWeb $timweb)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'jumlah_artikel' => 'required|integer',
            'jumlah_kata' => 'required|integer',
        ]);

        $timweb->update($request->all());

        return redirect()->route('tim_web.index')
            ->with('success', 'Data Tim Web berhasil diperbarui.');
    }

    public function destroy(TimWeb $timweb)
    {
        $timweb->delete();

        return redirect()->route('tim_web.index')
            ->with('success', 'Tim Web berhasil dihapus.');
    }
}
