@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/maintenancedep-dash.css') }}">
    <div class="welcome-section">
        <h2>Welcome, <span class="highlight">Samanalee!</span></h2>

        <div class="profile-card">
            <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
            <h3>Samanalee Fernando</h3>
            <p>Maintenance Department</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('previous.reports') }}" class="btn btn-secondary">POSTED ISSUES</a>
        </div>
    </div>
@stop
