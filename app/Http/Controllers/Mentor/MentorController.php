<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MentorController extends Controller
{
    // Menampilkan daftar mentor
    public function index()
    {
        $mentors = Mentor::all();
        return view('mentor.index', compact('mentors'));
    }

    // Menampilkan formulir untuk menambah mentor baru
    public function create()
    {
        return view('mentor.create'); // Pastikan view ini ada
    }

    // Menyimpan mentor baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mentors',
            'password' => 'required|string|min:8|confirmed',
            'nik' => 'nullable|string|max:20',
            'jabatan' => 'nullable|string|max:255',
        ]);

        Mentor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('mentor.index')->with('success', 'Mentor berhasil dibuat!');
    }

    // Menampilkan detail mentor
    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentor.show', compact('mentor'));
    }

    // Menampilkan formulir untuk mengedit mentor
    public function edit($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentor.edit', compact('mentor'));
    }

    // Memperbarui data mentor
    public function update(Request $request, $id)
    {
        $mentor = Mentor::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:mentors,email,' . $mentor->id,
            'nik' => 'nullable|string|max:20',
            'jabatan' => 'nullable|string|max:255',
        ]);

        $mentor->update($request->all());
        return redirect()->route('mentor.index')->with('success', 'Mentor berhasil diperbarui!');
    }

    // Menghapus mentor
    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();
        return redirect()->route('mentor.index')->with('success', 'Mentor berhasil dihapus!');
    }
}

