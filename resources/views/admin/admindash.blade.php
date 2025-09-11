@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admindash.css') }}">
    <div class="welcome-section">
        <h2>Welcome, <span class="highlight">{{ $user && $user->full_name ? explode(' ', $user->full_name)[0] : 'Admin' }}!</span></h2>

        <div class="profile-card">
            <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
            <h3>{{ $user->full_name ?? 'Administrator' }}</h3>
            <p class="role-badge">{{ $user->role->role_name ?? 'Admin' }}</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('all.pages') }}" class="btn btn-primary">VIEW ALL PAGES</a>
            <a href="{{ route('report') }}" class="btn btn-secondary">VIEW REPORTS</a>
        </div>
    </div>
@stop
