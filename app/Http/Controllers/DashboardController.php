<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Fake student data for frontend development
        $student = (object) [
            'name' => 'Samanalee Fernando',
            'avatar' => '/images/user.png', // replace with your default avatar path
        ];

        return view('student.dashboard', compact('student'));
    }
}

