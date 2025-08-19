@extends('layouts.auth')

@section('auth_content')
        <div class="register-container">
            <h2>Sign up to <span style="color: #e67e22;">ReportEase</span></h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('register.custom') }}">
                        @csrf

                        <div class="form-group">
                            <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First name" required autofocus>
                        </div>

                        <div class="form-group">
                            <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last name" required>
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Your Email Here" required>
                        </div>

                        <div class="form-group">
                            <input id="registration_number" type="text" class="form-control" name="registration_number" placeholder="Registration Number (e.g., XXXXXXXX)" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="role" class="form-control" name="role" required>
                                        <option value="" disabled selected>Select Your Role</option>
                                        <option value="stu">Student</option>
                                        <option value="fs">Faculty Adminstration</option>
                                        <option value="md">Maintenance Department</option>
                                    </select>
                                </div>
                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="+94" required>
                                </div>
                            </div>
                            </div>
                        </div>

                        <button type="submit" class="submit-button">
                            NEXT
                        </button>
                    </form>
                </div>
            </div>
        </div>
@endsection