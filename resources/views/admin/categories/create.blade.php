@extends('layouts.app')

@section('title', 'Add Category')
@section('content')
<div class="container">
    <h2>Add Category</h2>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
@endsection
