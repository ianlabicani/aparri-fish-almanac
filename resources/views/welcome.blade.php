<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            font-family: 'Figtree', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .auth-buttons a,
        .auth-buttons form button {
            margin: 0 10px;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Fish Almanac - Aparri</a>
            <div class="d-flex">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm me-2">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1>Welcome to the Fish Almanac of Aparri</h1>
            <p>Explore and learn about the rich marine biodiversity of our region.</p>
            @guest
                <div class="auth-buttons mt-3">
                    <a href="{{ route('login') }}" class="btn btn-light btn-lg">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
                    @endif
                </div>
            @endguest
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
