@extends('layouts.auth')

@section('auth_content')
    <div class="reset-password-content">
        <h2 class="text-2xl mb-2 text-left">Reset your password</h2>
        <p class="text-left text-gray-700 mb-6">
            Type in your new password
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input type="password" name="password" placeholder="New password *" required>
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm password *" required>
            </div>

            <button type="submit" class="submit-button">
                RESET PASSWORD
            </button>
        </form>
    </div>
@endsection