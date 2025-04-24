@extends('layouts.auth')

@section('auth_content')
        <div class="register-container">
            <h2>Set your <span style="color: #e67e22;">Password</span></h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('register.custom') }}">
                        @csrf

                        <div class="form-group">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password *" required>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Confirm Password *" required>
                        </div>

                        <button type="submit" class="submit-button">
                            SignUp
                        </button>
                    </form>
                </div>
            </div>
        </div>
@endsection
