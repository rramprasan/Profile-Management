@extends('layouts.app')

@section('title', 'Subcategories')
@section('content')
<div class="container">
    <h2 class="mb-4">Subcategories</h2>

    <!-- Add Subcategory Button -->
    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary mb-3">Add Subcategory</a>

    <!-- Subcategory Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Subcategory Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No subcategories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
