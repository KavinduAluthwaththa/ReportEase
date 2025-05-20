@extends('layouts.dashboard')

@section('content')
    <div class="w-5/6 p-10">
        <div class="flex items-center justify-center">
            <h1 class="text-3xl font-bold">Welcome, <span style="color: #e67e22;">Samanalee!</span></h1>
        </div>

        <div class="mt-10 text-center">
            <div class="inline-block p-6 bg-gray-100 rounded-xl">
                
                <div class="inline-block p-6 bg-gray-200 rounded-xl">
                    <img src="https://placekitten.com/100/100" class="w-24 h-24 rounded-full mx-auto" alt="Profile Picture">
                    <h2 class="text-xl mt-4 font-semibold">Samanalee Fernando</h2>
                    <p class="text-sm text-gray-600">Maintenance Department</p>
                </div>
                <div class="mt-6">
                    <a href="" class="submit-button">REVIEW REQUESTS</a>
                    <a href="" class="submit-button">PREVIOUS ISSUES</a>
                </div>
            </div>
        </div>
    </div>
@stop