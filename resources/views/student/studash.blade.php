@extends('layouts.dashboard')

@section('content')
    <div class="welcome-section">
        <h2>Welcome, <span class="highlight">{{ $student && $student->full_name ? explode(' ', $student->full_name)[0] : 'Student' }}!</span></h2>

        <div class="profile-card">
            <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
            <h3>{{ $student->full_name ?? 'Samanalee Fernando' }}</h3>
            <p class="role-badge">{{ $student->role->role_name ?? 'Student' }}</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('issue.create') }}" class="btn btn-primary">REPORT AN ISSUE</a>
            <a href="{{ route('previous.reports') }}" class="btn btn-secondary">PREVIOUS ISSUES</a>
        </div>
    </div>
@stop
