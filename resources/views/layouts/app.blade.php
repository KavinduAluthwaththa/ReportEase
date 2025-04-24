<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    {{-- Add Font Awesome for icons if needed, or use SVGs/images --}}
</head>
<body>
    <div class="app-container"> {{-- Renamed for clarity --}}
        <header class="app-header">
            <div class="logo">
                {{-- Assuming RE_White.png is suitable for a dark background --}}
                <img src="{{ asset('images/RE_White.png') }}" alt="ReportEase Logo">
            </div>
            <nav class="navigation">
                @guest
                    <a href="{{ route('login') }}" class="nav-link">Log In</a>
                    <div class="profile-icon">
                        <img src="{{ asset('images/user.png') }}" alt="Profile">
                    </div>
                @endguest
                @auth
                    {{-- Add authenticated user navigation here if needed --}}
                    <div class="profile-icon">
                        <img src="{{ asset('images/user.png') }}" alt="Profile">
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link logout-button">Logout</button>
                    </form>
                @endauth
            </nav>
        </header>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
    {{-- Add JS scripts here if needed --}}
</body>
</html>
