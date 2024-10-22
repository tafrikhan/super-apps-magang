<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    // Tampilkan semua instansi
    public function index()
    {
        $instansis = Instansi::all();
        return view('instansi.index', compact('instansis'));
    }

    // Form untuk tambah instansi baru
    public function create()
    {
        return view('instansi.create');
    }

    // Simpan instansi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
        ]);

        Instansi::create($request->all());
        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil ditambahkan');
    }

    // Form untuk edit instansi
    public function edit(Instansi $instansi)
    {
        return view('instansi.edit', compact('instansi'));
    }

    // Update data instansi
    public function update(Request $request, Instansi $instansi)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
        ]);

        $instansi->update($request->all());
        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil diperbarui');
    }

    // Hapus instansi
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil dihapus');
    }
}
