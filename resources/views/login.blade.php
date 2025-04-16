@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>Login to your account</h1>
    <form>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Login now" class="form-button">
    </form>
    <div class="signup-link">
        Don't Have An Account ? <a href="/register">Sign Up</a>
    </div>
</div>
@endsection
