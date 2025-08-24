@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <div class="main-wrapper">
        <div class="sub-headline">A reporting system that</div>
        <div class="headline">Streamlines Maintenance</div>
        <div class="paragraph">Easily report issues and keep maintenance tasks organized quickly within the <br>
            Faculty of Computing, Sabaragamuwa University of Sri Lanka.</div>
        <a href="/register" class="get-started-btn">Get Started</a>
    </div>
@endsection