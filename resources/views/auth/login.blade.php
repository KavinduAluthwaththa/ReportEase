@extends('layouts.auth')

@section('auth_content')
        <div class="register-container">
            <h2>Sign in</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address *" required>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password *" required>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center">
                            <button type="submit" class="submit-button">
                                LOGIN
                            </button>
                            <a href="#">Forgot your password?</a>
                        </div>
                    </form>

                    <div class="form-group">
                        <p>Don't Have An Account ?</p>
                        <a href="/register" class="submit-button-black">
                            CREATE NEW ACCOUNT
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
