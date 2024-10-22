<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Penugasan;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $penugasans = Penugasan::all();
        $mentors = Mentor::all(); // Ambil semua data mentor
        
        $instansis = Instansi::all();


        return view('admin.users.create', compact('penugasans','mentors', 'instansis' ));
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'instansi' => 'required|exists:instansis,id',
            'penugasan' => 'required|exists:penugasans,id',
            'mentor' => 'required|exists:mentors,id', // Validasi mentor yang ada
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'instansi' => $validatedData['instansi'], // Simpan instansi
            'penugasan' => $validatedData['penugasan'], // Simpan penugasan
            'mentor_id' => $validatedData['mentor'], // Simpan ID mentor
            'start_date' => $validatedData['start_date'], // Simpan tanggal mulai
            'end_date' => $validatedData['end_date'], // Simpan tanggal selesai
            'password' => bcrypt($validatedData['password']), // Hash password
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
