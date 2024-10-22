<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // Menampilkan daftar mentor
    public function index()
    {
        $mentors = Mentor::all();
        return view('admin.mentors.index', compact('mentors'));
    }

    // Form untuk menambahkan mentor baru
    public function create()
    {
        $mentors = Mentor::all(); 
        return view('admin.mentors.create', compact('mentors'));
    }

    // Menyimpan data mentor baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:mentors,nik',
            'nama' => 'required',
            'jabatan' => 'required|in:Manajer,SPV,Staff'
        ]);

        Mentor::create($request->all());

        return redirect()->route('mentors.index')
            ->with('success', 'Mentor berhasil ditambahkan.');
    }

    // Menampilkan detail mentor tertentu
    public function show(Mentor $mentor)
    {
        return view('admin.mentors.show', compact('mentor'));
    }

    // Form untuk mengedit mentor
    public function edit(Mentor $mentor)
    {
        return view('admin.mentors.edit', compact('mentor'));
    }

    // Mengupdate data mentor
    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'nik' => 'required|unique:mentors,nik,' . $mentor->id,
            'nama' => 'required',
            'jabatan' => 'required|in:Manajer,SPV,Staff'
        ]);

        $mentor->update($request->all());

        return redirect()->route('mentors.index')
            ->with('success', 'Mentor berhasil diupdate.');
    }

    // Menghapus data mentor
    public function destroy(Mentor $mentor)
    {
        $mentor->delete();

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor berhasil dihapus.');
    }
}
