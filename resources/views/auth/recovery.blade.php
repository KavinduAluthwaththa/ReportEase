@extends('layouts.guest')

@section('content')
    <div class="main-wrapper-reset">
        <h2 class="reset-password-content-left-align">Recovery Email Sent!</h2>
        <p class="reset-password-content-left-align">
            Please check your email for the next steps to reset your password.
        </p>
        <div>
            <a href="{{ route('login') }}">
                <button class="submit-button">
                    OKAY
                </button>
            </a>
        </div>
    </div>
@endsection
