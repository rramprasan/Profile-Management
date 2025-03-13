@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Forgot Password</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('password.request') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Enter your email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    required 
                    placeholder="example@email.com">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Send Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
