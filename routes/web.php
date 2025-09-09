<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes (no authentication required)
Route::get('/', [AuthController::class, 'Welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-custom',[AuthController::class, 'LoginCustom'])->name('login.custom');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register-custom',[AuthController::class, 'RegisterCustom'])->name('register.custom');
Route::get('/test-register', function () {
    return view('test-registration');
})->name('test.register');
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/recovery-email-sent', function () {
    return view('auth.recovery');
});
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('passwords.reset');
Route::get('/reset-password-dev', function () {
    return view('auth.passwords.reset', ['token' => null]);
})->name('password.reset.dev');
Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    return redirect('/login')->with('status', 'Password has been reset!');
})->name('password.update');

// Protected routes (authentication required)
Route::middleware(['auth'])->group(function () {
    
    // All Pages Index - View all pages at once
    Route::get('/all-pages', function () {
        $pages = [
            // Authentication Pages
            'Authentication Pages' => [
                ['name' => 'Login', 'url' => '/login', 'description' => 'User login page'],
                ['name' => 'Register', 'url' => '/register', 'description' => 'User registration page'],
                ['name' => 'Forget Password', 'url' => '/forget-password', 'description' => 'Password reset request'],
                ['name' => 'Recovery Email Sent', 'url' => '/recovery-email-sent', 'description' => 'Password recovery confirmation'],
                ['name' => 'Reset Password', 'url' => '/reset-password-dev', 'description' => 'Password reset form'],
            ],
            
            // Dashboard Pages
            'Dashboard Pages' => [
                ['name' => 'Student Dashboard', 'url' => '/student/dashboard', 'description' => 'Student dashboard view'],
                ['name' => 'Faculty Staff Dashboard', 'url' => '/facultystaff/dashboard', 'description' => 'Faculty staff dashboard'],
                ['name' => 'Maintenance Department Dashboard', 'url' => '/maintenancedep/dashboard', 'description' => 'Maintenance department dashboard'],
            ],
            
            // Issue Management Pages
            'Issue Management Pages' => [
                ['name' => 'Shared View Issues (Static)', 'url' => '/shared/viewissues', 'description' => 'Shared issue viewing page with demo data'],
                ['name' => 'Posted Issues', 'url' => '/PostedIssues', 'description' => 'View your posted issues'],
                ['name' => 'Create Issue', 'url' => 'shared/CreateIssue', 'description' => 'Report a new issue'],
            ],
            
            // Other Pages
            'Other Pages' => [
                ['name' => 'Welcome', 'url' => '/', 'description' => 'Welcome/home page'],
                ['name' => 'All Pages', 'url' => '/all-pages', 'description' => 'This page - overview of all available pages'],
            ]
        ];
        
        return view('all-pages', compact('pages'));
    })->name('all.pages');


    // Logout (needs to be authenticated to logout)
    Route::match(['GET', 'POST'], '/logout', [AuthController::class, 'Logout'])->name('logout');
    
    // Dashboard routes
    Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.studash');
    Route::get('/facultystaff/dashboard', function () {
        return view('facultystaff.fsdash');
    })->name('facultystaff.dashboard');
    Route::get('/maintenancedep/dashboard', function () {
        return view('maintenancedep.maintenancedepdash');
    })->name('maintenancedep.dashboard');
    
    // Issue Management routes
    Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
    Route::get('/PostedIssues', [IssueController::class, 'index'])->name('previous.reports');
    Route::get('/shared/viewissues/{id}', [IssueController::class, 'showViewIssues'])->name('shared.viewissues');
    Route::get('/shared/viewissues', function () {
        $issue = (object)[
            'id' => 'T001',
            'title' => 'Projector in the NLH is not working',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'reporter_name' => 'Samanalee Fernando',
            'reporter_email' => 'samanalee@gmail.com',
            'student_id' => '21CIS004',
            'created_at' => now(),
            'status' => 'Pending',
            'location' => 'NLH',
            'reporter_role' => 'Student'
        ];
        return view('shared.viewissues', compact('issue'));
    })->name('shared.viewissues.static');
    
    // Create and update issues
    Route::get('shared/CreateIssue', [IssueController::class, 'create'])->name('issue.create');
    Route::post('shared/CreateIssue', [IssueController::class, 'store'])->name('issues.store');
    Route::post('/issues/update/{id}', [IssueController::class, 'UpdateIssueStatus'])->name('issues.update');
    
    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('report');
    Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');

});
