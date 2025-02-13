 <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
     <div class="container">
         <!-- Logo / Brand -->
         <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
             <img src="{{ asset('images/fish.jpg') }}" alt="Logo" width="40" height="40" class="me-2">
             Fish Almanac - Aparri
         </a>

         <!-- Navbar Toggler for Mobile -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navbar Links -->
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a href="{{ route('guest.fish.index') }}" class="nav-link text-white">Species</a>
                 </li>

                 @auth
                     <li class="nav-item">
                         <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
                     </li>
                     <li class="nav-item">
                         <form action="{{ route('logout') }}" method="POST" class="d-inline">
                             @csrf
                             <button type="submit" class="btn btn-danger btn-sm ms-2">Logout</button>
                         </form>
                     </li>
                 @else
                     <li class="nav-item">
                         <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                     </li>
                     @if (Route::has('register'))
                         <li class="nav-item">
                             <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm ms-2">Register</a>
                         </li>
                     @endif
                 @endauth
             </ul>
         </div>
     </div>
 </nav>
