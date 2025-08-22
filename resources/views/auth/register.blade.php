@extends('layouts.auth')

@section('auth_content')
    <div class="auth-left">
        <div class="login-form">
            <h2>Sign up to <span style="color: #e67e22;">ReportEase</span></h2>
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
                    <div class="form-group ">
                        <label for="role">Select Your Role</label>
                        <select id="role" name="role" required>
                            <option value="" disabled selected>Select Here</option>
                            <option value="stu">Student</option>
                            <option value="fs">Faculty Adminstration</option>
                            <option value="md">Maintenance Department</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" placeholder="+94" required>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="{{ route('register2') }}">
                        <button type="submit" class="btn-login">NEXT</button>
                    </a>
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
