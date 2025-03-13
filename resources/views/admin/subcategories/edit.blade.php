@extends('layouts.app')

@section('title', 'Edit Subcategory')
@section('content')
<div class="container">
    <h2>Edit Subcategory</h2>

    <form method="POST" action="{{ route('admin.subcategories.update', $subcategory->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category</label>
            <select class="form-select" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Subcategory Name</label>
            <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Subcategory</button>
    </form>
</div>
@endsection
