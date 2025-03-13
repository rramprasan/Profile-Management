@extends('layouts.app')

@section('title', 'Add Subcategory')
@section('content')
<div class="container">
    <h2>Add Subcategory</h2>

    <form method="POST" action="{{ route('admin.subcategories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category</label>
            <select class="form-select" name="category_id" required>
                <option value="" disabled selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Subcategory Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Subcategory</button>
    </form>
</div>
@endsection
