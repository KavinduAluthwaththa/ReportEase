@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>Register</h1>
    <form>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <label for="role">Role</label>
        <select id="role" name="role">
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
            <option value="dean">Dean</option>
            <option value="maintenance">Maintenance Department</option>
        </select>

        <label for="faculty">Faculty</label>
        <select id="faculty" name="faculty">
            <option value="Agricultural Sciences">Faculuty of Agricultural Sciences</option>
            <option value="Applied Sciences">Faculuty of Applied Sciences</option>
            <option value="Geomatics">Faculuty of Geomatics</option>
            <option value="Graduate Studies">Faculuty of Graduate Studies</option>
            <option value="Management Studies">Faculuty of Management Studies</option>
            <option value="Medicine">Faculuty of Medicine</option>
            <option value="Social Sciences and Languages">Faculuty of Social Sciences and Languages</option>
            <option value="Technology">Faculuty of Technology</option>
            <option value="Computing">Faculuty of Computing</option>
        </select>

        <input type="submit" value="Register" class="form-button">
    </form>
    <div class="signup-link">
        Already Have An Account ? <a href="/login">Login</a>
    </div>
</div>
@endsection
