<?php

namespace App\Http\Controllers;

use App\Models\TimSosmed;
use Illuminate\Http\Request;

class TimSosmedController extends Controller
{
    public function index()
    {
        $tim_sosmeds = TimSosmed::all();
        return view('admin.tim_sosmed.index', compact('tim_sosmeds'));
    }

    public function create()
    {
        return view('admin.tim_sosmed.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pekerjaan_hari_ini' => 'required|string',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        TimSosmed::create($request->all());

        return redirect()->route('tim_sosmed.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(TimSosmed $tim_sosmed)
    {
        return view('admin.tim_sosmed.edit', compact('tim_sosmed'));
    }

    public function update(Request $request, TimSosmed $tim_sosmed)
    {
        $request->validate([
            'pekerjaan_hari_ini' => 'required|string',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $tim_sosmed->update($request->all());

        return redirect()->route('tim_sosmed.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(TimSosmed $tim_sosmed)
    {
        $tim_sosmed->delete();

        return redirect()->route('tim_sosmed.index')->with('success', 'Data berhasil dihapus!');
    }
}
