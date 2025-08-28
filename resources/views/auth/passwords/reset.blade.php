@extends('layouts.guest')

@section('content')
    <div class="main-wrapper-reset">
        
        <h2 class="reset-password-content-left-align">Reset your password</h2>
        <p class="reset-password-content-left-align">
            Type in your new password
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @if ($token)
                <input type="hidden" name="token" value="{{ $token }}">
            @endif

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="New password *" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password *" required>
            </div>

            <button type="submit" class="submit-button submit-button-full-width">
                RESET PASSWORD
            </button>
        </form>
    </div>
@endsection
