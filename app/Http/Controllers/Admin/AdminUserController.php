<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Penugasan;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        // Retrieve users with their related instansi, penugasan, and mentor
        $users = User::with('instansi', 'penugasan', 'mentor')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Retrieve all related data for the dropdowns
        $instansis = Instansi::all();
        $penugasans = Penugasan::all();
        $mentors = Mentor::all();

        return view('admin.users.create', compact('instansis', 'penugasans', 'mentors'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'instansi' => 'required|exists:instansis,id',
            'penugasan' => 'required|exists:penugasans,id',
            'mentor' => 'required|exists:mentors,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with the validated data
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'instansi_id' => $validatedData['instansi'],
            'penugasan_id' => $validatedData['penugasan'],
            'mentor_id' => $validatedData['mentor'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'password' => Hash::make($validatedData['password']), // Hash password
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dibuat!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // Retrieve related data for the edit form
        $instansis = Instansi::all();
        $penugasans = Penugasan::all();
        $mentors = Mentor::all();

        return view('admin.users.edit', compact('user', 'instansis', 'penugasans', 'mentors'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'instansi' => 'required|exists:instansis,id',
            'penugasan' => 'required|exists:penugasans,id',
            'mentor' => 'required|exists:mentors,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Update user with the validated data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'instansi_id' => $request->instansi,
            'penugasan_id' => $request->penugasan,
            'mentor_id' => $request->mentor,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
