@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/previous-report.css') }}">

    <div class="reports-container">
        <div class="header-container">
            <h1 class="reports-title">All Reported Issues</h1>
        </div>

        <table class="reports-table">
            <thead>
                <tr class="table-header">
                    <th>Issue ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Reporter</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr class="table-row" style="cursor: pointer;" onclick="window.location='{{ route('shared.viewissues', $report->issue_id ?? $report->id) }}'">
                    <td>IS{{ $report->issue_id ?? $report->id }}</td>
                    <td>{{ $report->title }}</td>
                    <td>
                        <span class="status-badge status-{{ strtolower(str_replace(' ', '_', $report->status ?? 'under_review')) }}">
                            {{ $report->status ?? 'Under Review' }}
                        </span>
                    </td>
                    <td>{{ $report->user->full_name ?? ($report->reporter->full_name ?? 'Unknown') }}</td>
                    <td>{{ isset($report->reported_at) ? $report->reported_at->format('M j, Y') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('shared.viewissues', $report->issue_id ?? $report->id) }}" class="see-more-link">VIEW</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <a class="new-issue-btn" href="{{ route('issue.create') }}">REPORT A NEW ISSUE</a>

    </div>
@endsection
