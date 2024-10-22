<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();
        return view('admin.mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('admin.mentors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:mentors|max:255',
            'nama' => 'required',
            'jabatan' => 'required|in:Manajer,SPV,Staff',
        ]);

        Mentor::create($request->all());

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor created successfully.');
    }

    public function edit(Mentor $mentor)
    {
        return view('admin.mentors.edit', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'nik' => 'required|max:255|unique:mentors,nik,' . $mentor->id,
            'nama' => 'required',
            'jabatan' => 'required|in:Manajer,SPV,Staff',
        ]);

        $mentor->update($request->all());

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor updated successfully.');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor deleted successfully.');
    }
}
