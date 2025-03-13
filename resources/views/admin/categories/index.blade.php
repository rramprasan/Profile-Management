@extends('layouts.app')

@section('title', 'Categories')
@section('content')
<div class="container">
    <h2 class="mb-4">Categories</h2>

    <!-- Add Category Button -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

    <!-- Category Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
