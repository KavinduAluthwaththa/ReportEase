@extends('layouts.guest')

@section('content')
    <div class="main-wrapper-reset">
        <h2 class="reset-password-content-left-align">Reset your password</h2>
        <p class="reset-password-content-left-align">Type in your email address to reset password</p>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 3000);
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
                <button type="submit" class="submit-button submit-button-full-width">
                    RESET PASSWORD
                </button>
            </div>
        </form>

        <div class="form-footer reset-password-content-left-align">
            <a href="{{ route('login') }}" class="back-link">← Back to Login</a>
        </div>
    </div>
@endsection
