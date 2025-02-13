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
    @include('guest.navbar')
    @yield('content')
</body>

</html>
