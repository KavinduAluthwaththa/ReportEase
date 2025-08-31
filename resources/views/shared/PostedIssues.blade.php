@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/previous-report.css') }}">

    <div class="reports-container">
        <div class="header-container">
            <h1 class="reports-title">Your Previous Reports</h1>
        </div>

        <table class="reports-table">
            <thead>
                <tr class="table-header">
                    <th>Report's ID</th>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr class="table-row">
                    <td>IS{{ $report->issue_id ?? $report->id }}</td>
                    <td>{{ $report->title }}</td>
                    <td>
                        <a href="{{ route('shared.viewissues', $report->issue_id ?? $report->id) }}" class="see-more-link">SEE MORE</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="new-issue-btn">REPORT AN ISSUE</a>

    </div>
@endsection
