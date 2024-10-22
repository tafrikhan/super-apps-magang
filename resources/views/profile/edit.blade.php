@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container my-5 mx-auto">
    <h1 class="mb-4 text-right" style="font-family: 'Arial', sans-serif;">Edit Profil</h1>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724;">
            Profil berhasil diperbarui.
        </div>
    @endif

    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab">
                Perbarui Profil
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" role="tab">
                Ganti Password
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#delete" role="tab">
                Hapus Akun
            </button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" 
                  class="p-4 border rounded shadow-sm" style="background-color: #f9f9f9;">
                @csrf
                @method('PATCH')

                <div class="text-center mb-4">
                    <label for="profile_photo" class="form-label">Foto Profil</label>
                    <div class="mt-2">
                        <img src="{{ asset(auth()->user()->profile_photo ? 'storage/' . auth()->user()->profile_photo : 'assets/img/avatars/default.jpg') }}" 
                             alt="User Avatar" 
                             class="w-px-150 h-auto rounded-circle shadow" />
                    </div>
                    <input type="file" class="form-control mt-3" id="profile_photo" name="profile_photo" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ auth()->user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ auth()->user()->email }}" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Simpan Perubahan</button>
            </form>
        </div>

        <div class="tab-pane fade" id="password" role="tabpanel">
            @include('profile.partials.update-password-form')
        </div>

        <div class="tab-pane fade" id="delete" role="tabpanel">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
