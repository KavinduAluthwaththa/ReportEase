@extends('layouts.auth')

@section('auth_content')
    <div class="auth-left">
        <div class="login-form">
            <h2>Sign up to <span style="color: #e67e22;">ReportEase</span></h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="color: red; margin: 10px 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success">
                    <p style="color: green; margin: 10px 0;">{{ session('success') }}</p>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register.custom') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group ">
                        <label for="first_name">First name</label>
                        <input id="first_name" type="text" name="first_name" required autofocus>
                    </div>
                    <div class="form-group ">
                        <label for="last_name">Last name</label>
                        <input id="last_name" type="text" name="last_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="Your Email Here" required>
                </div>
                <div class="form-group">
                    <label for="registration_number">Registration Number</label>
                    <input id="registration_number" type="text" name="registration_number" placeholder="XXXXXXXX" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group ">
                        <label for="role_id">Select Your Role</label>
                        <select id="role_id" name="role_id" required>
                            <option value="" disabled selected>Select Here</option>
                            @foreach(App\Models\Role::all() as $role)
                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="phone_number">Phone</label>
                        <input id="phone_number" type="text" name="phone_number" placeholder="+94" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-login">REGISTER</button>
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
