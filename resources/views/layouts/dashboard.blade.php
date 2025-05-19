@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
     <div class="w-1/6 bg-gray-200 p-6 border-r-2 border-r-orange-600 flex flex-col justify-between">
        <div>
            <nav class="flex flex-col h-full justify-between">
                <div>
                    <a href="" class="block mb-4 font-bold {{ Route::currentRouteName() == 'dashboard' ? 'text-orange-600' : 'text-gray-700' }}">
                        <x-heroicon-s-home /> Dashboard
                    </a>
                    <a href="" class="block mb-4 font-bold {{ Route::currentRouteName() == 'profile' ? 'text-orange-600' : 'text-gray-700' }}">
                        <x-uni-setting-o /> Profile
                    </a>
                </div>
                <a href="{{ route('logout') }}" class="text-red-600 font-bold">
                    <x-gmdi-logout /> Logout
                </a>
            </nav>

        </div>
    </div>

    <!-- Main Content -->
     @yield('content')

     
    <div class="w-5/6 p-10">
        <div class="flex items-center justify-center">
            <h1 class="text-3xl font-bold">Welcome, <span style="color: #e67e22;">Samanalee!</span></h1>
        </div>

        <div class="mt-10 text-center">
            <div class="inline-block p-6 bg-gray-100 rounded-xl">
                
                <div class="inline-block p-6 bg-gray-200 rounded-xl">
                    <img src="https://placekitten.com/100/100" class="w-24 h-24 rounded-full mx-auto" alt="Profile Picture">
                    <h2 class="text-xl mt-4 font-semibold">Samanalee Fernando</h2>
                    <p class="text-sm text-gray-600">Student</p>
                </div>
                <div class="mt-6">
                    <a href="" class="submit-button">REPORT AN ISSUE</a>
                    <a href="" class="submit-button">PREVIOUS ISSUES</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
