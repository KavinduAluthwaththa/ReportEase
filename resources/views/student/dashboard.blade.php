@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <aside class="sidebar">
        <div class="logo">
            
        </div>

        <ul>
            <li class="{{ request()->is('student/dashboard') ? 'active' : '' }}">
                <a href="{{ route('student.dashboard') }}">
                    <x-heroicon-s-home class="w-5 h-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <x-ionicon-settings-outline class="w-5 h-5" />
                    <span>Profile</span>
                </a>
            </li>
        </ul>

        <a href="#" class="logout">
            <x-gmdi-logout class="w-5 h-5" />
            <span>Logout</span>
        </a>
    </aside>

    <main class="main-content">
        <div class="welcome-section">
            <h2>Welcome, <span class="highlight">{{ $student->name }}!</span></h2>

            <div class="profile-card">
                <img src="{{ $student->avatar }}" alt="Profile Picture" class="profile-img">
                <h3>{{ $student->name }}</h3>
                <p>Student</p>
            </div>

            <div class="action-buttons">
                <a href="#" class="btn btn-primary">REPORT AN ISSUE</a>
                <a href="#" class="btn btn-secondary">PREVIOUS ISSUES</a>
            </div>
        </div>
    </main>
</div>
@endsection