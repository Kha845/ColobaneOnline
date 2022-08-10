
<nav class="navbar navbar-expand-lg navbar-info bg-info">
    <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link
             @if (Request::route()->getName() == 'app_name') active @endif" aria-current="page"
                        href="{{ route('app_home') }}">Home</a>
                </li>
                <li class="nav-item
          @if (Request::route()->getName() == 'app_about') active @endif"><a class="nav-link"
                        href="{{ route('app_about') }}">About</a></li>
            </ul>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group">
            @guest
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    My account
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                </ul>
            @endguest
            @auth
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="{{ route('app_logout') }}">Logout</a></li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
