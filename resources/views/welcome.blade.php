@extends('layouts.app')

@section('content')
    <style>
        .main-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
            padding: 0 20px;
            min-height: calc(100vh - 70px);
        }

        .headline {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            margin-top: 0.1rem;
        }

        .sub-headline {
            font-size: 2rem;
            font-weight: 500;
            padding bottom: 0;
            margin-bottom: 0;
            line-height: 0;
        }

        .paragraph {
            font-size: 1rem;
            font-weight: normal;
            line-height: 1.4;
            margin-bottom: 1.2rem;
        }

        .get-started-btn {
            padding: 6px 24px;
            font-weight: bold;
            color: white;
            border-radius: 0.375rem; /* equals 6px */
            background: linear-gradient(to right, #eb4c09, #fe824d);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 14px;
            border: none;
            transition: transform 0.3s ease;
            margin-top: 1.2rem;
        }

        .cta-gradient-btn:hover {
            transform: scale(1.05);
    }


    </style>

    

    <div class="main-wrapper">
        <div class="sub-headline">A reporting system that</div>
        <div class="headline">Streamlines Maintenance</div>
        <div class="paragraph">Easily report issues and keep maintenance tasks organized quickly within the <br>
            Faculty of Computing, Sabaragamuwa University of Sri Lanka.</div>
        <a href="/register" class="get-started-btn">Get Started</a>
    </div>
@endsection