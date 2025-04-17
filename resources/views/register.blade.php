@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>Register</h1>
    <form>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="stu">Student</option>
            <option value="lec">Lecturer</option>
            <option value="fs">Faculty Staff</option>
            <option value="hod">Head of the Faculty</option>
            <option value="md">Maintenance Department</option>
        </select>

        <label for="faculty">Faculty</label required>
        <select id="faculty" name="faculty">
            <option value="Agri">Faculty of Agricultural Sciences</option>
            <option value="App">Faculty of Applied Sciences</option>
            <option value="Geo">Faculty of Geomatics</option>
            <option value="Grad">Faculty of Graduate Studies</option>
            <option value="Mana">Faculty of Management Studies</option>
            <option value="Med">Faculty of Medicine</option>
            <option value="Social">Faculty of Social Sciences and Languages</option>
            <option value="Tech">Faculty of Technology</option>
            <option value="Com">Faculty of Computing</option>
        </select>

        <input type="submit" value="Register" class="form-button">
    </form>
    <div class="signup-link">
        Already Have An Account ? <a href="/login">Login</a>
    </div>
</div>
@endsection
