@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="container mt-4">
    <h2>Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                class="form-control" 
                id="name" 
                name="name" 
                required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                required>
        </div>

        <!-- Profile Photo -->
        <div class="mb-3">
            <label for="profile_photo" class="form-label">Profile Photo</label>
            <input type="file" class="form-control" id="profile_photo" name="profile_photo">
        </div>

        <!-- Role Selection -->
        <div class="mb-3">
            <label class="form-label">Role</label>
            <div>
                <input type="radio" id="admin" name="is_admin" value="1"> 
                <label for="admin">Admin</label>
                
                <input type="radio" id="user" name="is_admin" value="0" checked> 
                <label for="user">User</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add User</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
