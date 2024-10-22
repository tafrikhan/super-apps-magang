<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Mentor;
use App\Models\Penugasan;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public function index()
    {
        $penugasans = Penugasan::all();
        return view('admin.penugasan.index', compact('penugasans')); // Ubah path view
    }

    public function create()
    {
        return view('admin.penugasan.create'); //
    return view('nama_view', compact('instansis', 'penugasans', 'mentors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_unit_bisnis' => 'required|string|max:255' // Validasi lebih ketat
        ]);
        
        Penugasan::create($request->all());
        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil ditambahkan.');
    }

    public function edit(Penugasan $penugasan)
    {
        return view('admin.penugasan.edit', compact('penugasan')); // Ubah path view
    }

    public function update(Request $request, Penugasan $penugasan)
    {
        $request->validate([
            'nama_unit_bisnis' => 'required|string|max:255' // Validasi lebih ketat
        ]);
        
        $penugasan->update($request->all());
        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil diupdate.');
    }

    public function destroy(Penugasan $penugasan)
    {
        $penugasan->delete();
        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil dihapus.');
    }
}
