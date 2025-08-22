<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body>
    <header class="app-header">
        <div class="logo">
            <img src="{{ asset('images/RE_White.png') }}" alt="ReportEase Logo">
        </div>
        <nav class="navigation">
            <a href="{{ route('login') }}" class="nav-link">Log In</a>
            <div class="profile-icon">
                <img src="{{ asset('images/user.png') }}" alt="Profile">
            </div>
        </nav>
    </header>
    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>
