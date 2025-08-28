@extends('layouts.auth')

@section('auth_content')
    <div class="auth-left">
        <div class="login-form">
            <h2>Sign in</h2>
            <form method="POST" action="{{ route('login.custom') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" name="email" placeholder="Email Address *" required>
                </div>
                <div class="form-group">
                    <input id="password" type="password" name="password" placeholder="Password *" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-login">LOGIN</button>
                    <a href="#" class="forgot-password">Forgot your password?</a>
                </div>
            </form>
            <div class="create-account-section">
                <p>Don't Have An Account ?</p>
                <a href="/register" class="btn-create-account">CREATE NEW ACCOUNT</a>
            </div>
        </div>
    </div>
    <div class="auth-right">
        <div class="auth-background-image">
            <div class="background-text">
                <!-- texts if need -->
            </div>
        </div>
    </div>
@endsection
