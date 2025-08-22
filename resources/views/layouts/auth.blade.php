<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @if (Route::currentRouteName() == 'register' || Route::currentRouteName() == 'register2')
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @endif
</head>
<body>
    <header class="auth-header">
        <div class="logo-container">
            <img src="{{ asset('images/RE_White.png') }}" alt="ReportEase Logo" class="logo">
        </div>
        <div class="auth-nav">
            <a href="/login">Log In</a>
            <img src="{{ asset('images/user.png') }}" alt="Profile Icon" class="profile-icon">
        </div>
    </header>

    <main class="auth-main">
        @yield('auth_content')
    </main>
</body>
</html>
