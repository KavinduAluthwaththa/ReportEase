@extends('layouts.dashboard')

@section('content')

<style>
    .heading {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .report-card {
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        padding: 16px;
        margin-bottom: 16px;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: box-shadow 0.2s ease-in-out;
    }

    .report-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .report-info {
        display: flex;
        flex-direction: column;
    }

    .report-issue-no {
        font-weight: bold;
        font-size: 16px;
        color: #333;
    }

    .report-title {
        font-size: 14px;
        color: #555;
        margin-top: 4px;
    }

    .see-more-btn {
        background-color: #000000;
        color: #ffffff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.2s ease-in-out;
    }

    .see-more-btn:hover {
        background-color: #333333;
    }

    .new-issue-btn {
        background-color: orange;
        color: white;
        font-weight: bold;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        margin-top: 24px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    .new-issue-btn:hover {
        background-color: darkorange;
    }
</style>

<h2 class="heading">Your Previous Reports</h2>

@foreach($reports as $report)
    <div class="report-card">
        <div class="report-info">
            <span class="report-issue-no">{{ $report->issue_no }}</span>
            <span class="report-title">{{ $report->title }}</span>
        </div>
        <a href="{{ route('report.show', $report->id) }}" class="see-more-btn">View</a>
    </div>
@endforeach

<button class="new-issue-btn">Report a New Issue</button>

@endsection
