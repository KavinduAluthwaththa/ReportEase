@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<div style="display: flex;">
    <div class="left-side">
        @yield('auth_content') {{-- placeholder for auth page content --}}
    </div>
    <div class="right-side">
        {{-- Right side content,if any common --}}
    </div>
</div>
@endsection
