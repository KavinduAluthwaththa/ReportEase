@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/fsdash.css') }}">
    <div class="welcome-section">
        <h2>Welcome, <span class="highlight">{{ $user && $user->full_name ? explode(' ', $user->full_name)[0] : 'Faculty Member' }}!</span></h2>

        <div class="profile-card">
            <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
            <h3>{{ $user->full_name ?? 'Faculty Member' }}</h3>
            <p class="role-badge">{{ $user->role->role_name ?? 'Faculty Staff' }}</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('issue.create') }}" class="btn btn-primary">REPORT AN ISSUE</a>
            <a href="{{ route('previous.reports') }}" class="btn btn-secondary">PREVIOUS ISSUES</a>
        </div>
    </div>
@stop
