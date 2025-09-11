@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/maintenancedep-dash.css') }}">
    <div class="welcome-section">
        <h2>Welcome, <span class="highlight">{{ $user && $user->full_name ? explode(' ', $user->full_name)[0] : 'Maintenance Staff' }}!</span></h2>

        <div class="profile-card">
            <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
            <h3>{{ $user->full_name ?? 'Maintenance Staff' }}</h3>
            <p class="role-badge">{{ $user->role->role_name ?? 'Maintenance Department' }}</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('previous.reports') }}" class="btn btn-secondary">POSTED ISSUES</a>
        </div>
    </div>
@stop
