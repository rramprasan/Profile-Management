@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                class="form-control" 
                id="name" 
                name="name" 
                value="{{ $user->name }}" 
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
                value="{{ $user->email }}" 
                required>
        </div>

        <!-- Profile Photo -->
        <div class="mb-3">
            <label for="profile_photo" class="form-label">Profile Photo</label>
            @if($user->profile_photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                         alt="Profile Photo" 
                         class="img-thumbnail" 
                         width="70">
                </div>
            @else
                <div class="mb-2">
                    <img src="{{ asset('default-profile.jpg') }}" 
                         alt="Default Profile" 
                         class="img-thumbnail" 
                         width="70">
                </div>
            @endif
            <input type="file" class="form-control" id="profile_photo" name="profile_photo">
        </div>

        <!-- Categories Selection (Checkboxes) -->
        <div class="mb-3">
            <label class="form-label">Assign Categories</label>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="category_{{ $category->id }}" 
                                name="categories[]" 
                                value="{{ $category->id }}" 
                                @if($user->categories->contains($category->id)) checked @endif>
                            <label class="form-check-label" for="category_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Subcategories Selection (Checkboxes) -->
        <div class="mb-3">
            <label class="form-label">Assign Subcategories</label>
            <div class="row">
                @foreach($subcategories as $subcategory)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="subcategory_{{ $subcategory->id }}" 
                                name="subcategories[]" 
                                value="{{ $subcategory->id }}" 
                                @if($user->subcategories->contains($subcategory->id)) checked @endif>
                            <label class="form-check-label" for="subcategory_{{ $subcategory->id }}">
                                {{ $subcategory->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Is Admin Radio Buttons -->
        <div class="mb-3">
            <label class="form-label">Admin Role</label>
            <div class="form-check">
                <input 
                    type="radio" 
                    class="form-check-input" 
                    id="admin_yes" 
                    name="is_admin" 
                    value="1"
                    {{ $user->is_admin ? 'checked' : '' }}>
                <label class="form-check-label" for="admin_yes">Yes (Admin)</label>
            </div>
            <div class="form-check">
                <input 
                    type="radio" 
                    class="form-check-input" 
                    id="admin_no" 
                    name="is_admin" 
                    value="0"
                    {{ !$user->is_admin ? 'checked' : '' }}>
                <label class="form-check-label" for="admin_no">No (User)</label>
            </div>
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
