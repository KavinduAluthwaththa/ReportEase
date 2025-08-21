<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header class="auth-header bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/RE_White.png') }}" alt="ReportEase Logo" class="h-8 mr-2">
            
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="hover:underline">Log In</a>
            <img src="{{ asset('images/user.png') }}" alt="Profile Icon" class="h-8 w-8 rounded-full">
        </div>
    </header>

    <main class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
        @yield('auth_content')
    </main>
</body>
</html>
