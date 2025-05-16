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

    public function Register2()
    {
        return view('auth.register2');
    }

    public function RegisterCustom(Request $request)
    {
        // Validate the request
        $request->validate(
            [
                'password' => 'required|min:6|confirmed',
            ]
        );

        // Create the user
        $data = $request->all();
        $data['name'] = 'Test User';
        $data['username'] = 'testuser';
        $data['email'] = 'test@example.com';
        $data['role'] = 'stu';
        $data['faculty'] = 'test faculty';
        $check = $this->create($data);

        // Check if the user was created successfully (Redirect logic remains the same)
        return redirect("Login")->withSuccess('You have successfully registered');
    }

    public function create(array $data)
    {
        // Use the combined 'name' field
        return \App\Models\User::create([
            'name' => $data['name'], // Use combined name
            'username' => $data['username'], // Added username
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
