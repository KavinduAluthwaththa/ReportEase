@extends('layouts.auth')

@section('auth_content')
    <div class="recovery-content">
        <h2 class="text-2xl mb-4 text-left">Recovery Email Sent!</h2>
        <p class="text-left text-gray-700 mb-6">
            Please check your email for the next steps to reset your password.
        </p>
        <div class="text-left">
            <a href="{{ route('login') }}">
                <button class="submit-button">
                    OKAY
                </button>
            </a>
        </div>
    </div>
@endsection
