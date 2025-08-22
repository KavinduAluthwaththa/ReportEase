@extends('layouts.auth')

@section('auth_content')
    <div class="auth-left">
        <div class="login-form">
            <h2>Set your Password</h2>
            <form method="POST" action="{{ route('register.custom') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Your Password Here" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Your Password Here" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-login">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <div class="auth-right">
        <div class="auth-background-image">
            <div class="background-text">
                <!--An Image goes here!-->
            </div>
        </div>
    </div>
@endsection
