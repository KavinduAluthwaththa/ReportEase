<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Register()
    {
        return view('register');
    }

    public function Login()
    {
        return view('login');
    }

}
