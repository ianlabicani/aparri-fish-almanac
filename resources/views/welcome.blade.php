@extends('guest.shell')

@section('content')
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
@endsection
