@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">

    <!-- Heading -->
    <div class="text-center mb-4">
        <h1>Welcome to Profile Management System</h1>
        <p>Manage profiles efficiently with our system.</p>
    </div>

    <!-- Profiles Slider (Carousel) -->
    <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner text-center">
            @foreach($profiles as $profile)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset($profile->profile_photo ? 'storage/' . $profile->profile_photo : 'default-profile.jpg') }}" 
                             class="rounded-circle border border-primary mb-3 shadow-lg" 
                             alt="{{ $profile->name }}" 
                             width="200" 
                             height="200">
                        <h4 class="fw-bold">{{ $profile->name }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#profileCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#profileCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileCarousel = document.getElementById('profileCarousel');
        new bootstrap.Carousel(profileCarousel, {
            interval: 2000, // Slide every 2.5 seconds
            pause: 'hover'  // Pause when hovered
        });
    });
</script>

@endsection
