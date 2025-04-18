<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function Login()
    {
        return view('auth.login');
    }

    public function LoginCustom(Request $request)
    {
        // Validate the request
        $validator = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
            );
        
        // Check if the user is already logged in
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
           return redirect()->intended('dashboard')->withSuccess('You have successfully logged in');
        }
        // If authentication fails, redirect back with an error message
        $validator['emailpassword'] = 'Invalid email or password';
        return redirect("Login")->withErrors($validator);

        
    }

    public function Register()
    {
        return view('auth.register');
    }

    public function RegisterCustom(Request $request)
    {
        // Validate the request
        $request->validate(
            [
                'username' => 'required|min:3|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:stu,lec,fs,hod,md',
                'faculty' => 'required',
            ]
        );

        // Create the user
        $data = $request->all();
        $check = $this->create($data);

        // Check if the user was created successfully
        return redirect("Login")->withSuccess('You have successfully registered');
    }

    public function create(array $data)
    {
        return \App\Models\User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'faculty' => $data['faculty'],
        ]);
    }
    public function Logout()
    {
        auth()->logout();
        return redirect('Login')->withSuccess('You have successfully logged out');
    }

}
