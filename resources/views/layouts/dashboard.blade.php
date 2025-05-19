<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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
                    <a href="" class="nav-link">Profile</a>
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
            <div class="flex h-screen">
                
                <!-- Sidebar -->
                <div class="w-1/6 bg-gray-200 p-6 border-r-2 border-r-orange-600 flex flex-col justify-between">
                    <div>
                        <nav class="flex flex-col h-full justify-between">
                            <div>
                                <a href="" class="inline-flex items-center gap-2 mb-4 font-bold {{ Route::currentRouteName() == 'dashboard' ? 'text-orange-600' : 'text-gray-700' }}">
                                    <x-heroicon-s-home class="w-5 h-5" />
                                    <span>Dashboard</span>
                                </a>
                                <br>
                                <a href="" class="inline-flex items-center gap-2 mb-4 font-bold {{ Route::currentRouteName() == 'profile' ? 'text-orange-600' : 'text-gray-700' }}">
                                    <x-ionicon-settings-outline class="w-5 h-5" />
                                    <span>Profile</span>
                                </a>
                            </div>
                            <a href="{{ route('logout') }}" class="inline-flex items-center gap-2 text-red-600 font-bold">
                                <x-gmdi-logout class="w-5 h-5" />
                                <span>Logout</span>
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->                
                <div class="w-5/6 p-10">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    {{-- Add JS scripts here if needed --}}
</body>
</html>
