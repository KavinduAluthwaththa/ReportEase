<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //return login view
    public function Login()
    {
        return view('auth.login');
    }

    //validating login
    public function LoginCustom(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to login
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have successfully logged in');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    //return registration view
    public function Register()
    {
        return view('auth.register');
    }






    // Show forget password form
public function showForgetPasswordForm()
{
    return view('auth.forgetpassword');
}







    //validating registration
    public function RegisterCustom(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'registration_number' => 'required|string|unique:users,registration_number',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string',
        ]);

        // Prepare data
        $data = $request->all();
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Create the user
        $this->create($data);

        return redirect("Login")->withSuccess('You have successfully registered');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'registration_number' => $data['registration_number'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
    }

    //logout function
    public function Logout()
    {
        auth()->logout();
        return redirect('Login')->withSuccess('You have successfully logged out');
    }

    //send reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        // This is just a placeholder. In a real application, you would send an email.
        return back()->with('status', 'Password reset link sent!');
    }
}

  //routes to welcomepage
  public function Welcome()
    {
        return view('welcome');
    }
}

