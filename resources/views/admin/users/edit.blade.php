@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Jenis Kelamin Field -->
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Laki-laki" {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <!-- Sekolah Field -->
        <div class="mb-3">
            <label for="school" class="form-label">Sekolah</label>
            <input type="text" class="form-control" id="school" name="school" value="{{ old('school', $user->school) }}" required>
        </div>

        <!-- Tanggal Mulai Magang Field -->
        <div class="mb-3">
            <label for="start_internship" class="form-label">Tanggal Mulai Magang</label>
            <input type="date" class="form-control" id="start_internship" name="start_internship" value="{{ old('start_internship', $user->start_internship) }}" required>
        </div>

        <!-- Tanggal Selesai Magang Field -->
        <div class="mb-3">
            <label for="end_internship" class="form-label">Tanggal Selesai Magang</label>
            <input type="date" class="form-control" id="end_internship" name="end_internship" value="{{ old('end_internship', $user->end_internship) }}" required>
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password (leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Confirm Password Field -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
