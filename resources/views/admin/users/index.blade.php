@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container py-5">
    <h2>User Management</h2>
    
    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            Add New User
        </a>
    </div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>School</th>
                <th>Address</th>
                <th>Internship Start</th>
                <th>Internship End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->gender) }}</td>
                    <td>{{ $user->school }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->internship_start }}</td>
                    <td>{{ $user->internship_end }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                           class="btn btn-warning btn-sm mb-1">Edit</a>

                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
