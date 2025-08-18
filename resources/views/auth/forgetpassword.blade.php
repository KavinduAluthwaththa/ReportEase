@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/forgetpassword.css') }}">
        <div class="register-container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="forgot-password-form">
                        <h3>Reset your password</h3>
                        <p class="reset-description">Type in your email address to reset password</p>
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                         
                            <script>
                                // Change this URL to the next page
                                window.location.href = "/password/sent";
                            </script>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" placeholder="Email Address *" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="submit-button reset-button">
                                    RESET PASSWORD
                                </button>
                            </div>
                        </form>

                        <div class="form-footer">
                            <a href="{{ route('login') }}" class="back-link">← Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
