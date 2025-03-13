<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profile Management System')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS (if needed) -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Profile Management</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'active text-white' : '' }}"
                                href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active text-white' : '' }}"
                                    href="{{ route('admin.categories.index') }}">
                                    Categories
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.subcategories.index') ? 'active text-white' : '' }}"
                                    href="{{ route('admin.subcategories.index') }}">
                                    Subcategories
                                </a>
                            </li>
                        @endif



                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="color: #fff;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active text-white' : '' }}"
                                href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active text-white' : '' }}"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>



            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container content py-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-3">
        &copy; {{ date('Y') }} Profile Management System | All Rights Reserved
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
