@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p>Your profile and account details are managed here.</p>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Role:</strong> {{ Auth::user()->is_admin ? 'Admin' : 'User' }}</p>
            @if(Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                     alt="Profile Photo" 
                     class="img-thumbnail" 
                     width="100">
            @else
                <img src="{{ asset('default-profile.png') }}" 
                     alt="Default Profile" 
                     class="img-thumbnail" 
                     width="100">
            @endif
        </div>
    </div>
</div>
@endsection
