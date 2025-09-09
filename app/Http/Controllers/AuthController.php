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
            // Store user role/type in session for quick access in views
            $user = auth()->user();
            $roleName = optional($user->role)->role_name;
            session([
                'user_role' => $roleName,
                'user_role_id' => $user->role_id ?? null,
                'user_id' => $user->user_id ?? null,
            ]);

            // Redirect to dashboard based on role (compatible with older PHP)
            if ($roleName === 'Student') {
                $targetUrl = route('student.studash');
            } elseif ($roleName === 'Faculty Staff') {
                $targetUrl = route('facultystaff.dashboard');
            } elseif ($roleName === 'Maintenance Department') {
                $targetUrl = route('maintenancedep.dashboard');
            } elseif ($roleName === 'Admin') {
                $targetUrl = route('all.pages');
            } else {
                $targetUrl = route('welcome');
            }

            return redirect()->intended($targetUrl)->withSuccess('You have successfully logged in');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    //return registration view
    public function Register()
    {
        return view('auth.register');
    }

    //return registration2 view
    public function Register2()
    {
        return view('auth.register2');
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
            'email' => 'required|email|unique:Users,email',
            'registration_number' => 'required|string|unique:Users,ID',
            'phone_number' => 'required|numeric|unique:Users,phone_number',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string',
        ]);

        // Prepare data
        $data = $request->all();
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Create the user
        $this->create($data);

        return redirect()->route('login')->withSuccess('You have successfully registered');
    }

    //validating registration2
    public function Register2Custom(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:Users,email',
            'registration_number' => 'required|string|unique:Users,ID',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string',
        ]);

        // Prepare data
        $data = $request->all();
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Create the user
        $this->create($data);

        return redirect()->route('login')->withSuccess('You have successfully registered');
    }

    public function create(array $data)
    {
        // Map role name to role_id
        $roleMapping = [
            'Admin' => 1,
            'Faculty Staff' => 2,
            'Maintenance Department' => 3,
            'Student' => 4,
        ];

        return User::create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'ID' => $data['registration_number'],
            'password' => bcrypt($data['password']),
            'role_id' => $roleMapping[$data['role']] ?? 4, // Default to Student
            'section_id' => 1, // Default to Faculty Administration
            'phone_number' => $data['phone_number'] ?? 1234567890,
        ]);
    }

    //logout function
    public function Logout()
    {
    // Clear custom session entries
    session()->forget(['user_role', 'user_role_id', 'user_id']);
    auth()->logout();
        return redirect()->route('login')->withSuccess('You have successfully logged out');
    }

    //send reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        // This is just a placeholder. In a real application, you would send an email.
        return back()->with('status', 'Password reset link sent!');
    }

    //routes to welcomepage
    public function Welcome()
    {
        return view('welcome');
    }
}
