<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->load('role');
        return view('student.studash', ['student' => $user]);
    }

    public function facultyStaffDashboard(Request $request)
    {
        $user = Auth::user()->load('role');
        return view('facultystaff.fsdash', ['user' => $user]);
    }

    public function maintenanceDashboard(Request $request)
    {
        $user = Auth::user()->load('role');
        return view('maintenancedep.maintenancedepdash', ['user' => $user]);
    }

    public function adminDashboard(Request $request)
    {
        $user = Auth::user()->load('role');
        return view('admin.admindash', ['user' => $user]);
    }
}
