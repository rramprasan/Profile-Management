@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <h2>Admin Dashboard</h2>

        <div class="d-flex justify-content-between align-items-center my-3">
            <h4>Users List</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add User</a>
        </div>

        <div class="card">

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Photo</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->profile_photo)
                                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo"
                                            class="img-thumbnail" width="50">
                                    @else
                                        <img src="{{ asset('default-profile.jpg') }}" alt="Default Profile"
                                            class="img-thumbnail" width="50">
                                    @endif
                                </td>
                                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
