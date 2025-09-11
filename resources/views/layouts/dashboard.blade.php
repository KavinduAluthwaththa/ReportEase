<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportEase</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>
<body>
    <div class="app-container">
        <header class="app-header">
            <div class="logo">
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
                    <div class="profile-icon">
                        <img src="{{ asset('images/user.png') }}" alt="Profile">
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link">LOGOUT</button>
                    </form>
                @endauth
            </nav>
        </header>

        <div class="dashboard-container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <nav>
                    <ul>
                        <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            @php
                                $role = session('user_role');
                                if ($role === 'Student') {
                                    $dashboardUrl = route('student.studash');
                                } elseif ($role === 'Faculty Staff') {
                                    $dashboardUrl = route('facultystaff.dashboard');
                                } elseif ($role === 'Maintenance Department') {
                                    $dashboardUrl = route('maintenancedep.dashboard');
                                } elseif ($role === 'Admin') {
                                    $dashboardUrl = route('admin.dashboard');
                                } else {
                                    $dashboardUrl = route('welcome');
                                }
                            @endphp
                            <a href="{{ $dashboardUrl }}" class="nav-link">
                                <img src="{{ asset('images/home.png') }}" alt="Dashboard" class="nav-icon">
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
                            <a href="" class="nav-link">
                                <img src="{{ asset('images/settings.png') }}" alt="Profile" class="nav-icon">
                                <span><b>Profile</b></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
