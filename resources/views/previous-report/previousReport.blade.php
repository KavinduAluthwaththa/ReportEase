@extends('layouts.dashboard')

@section('content')


<div class="reports-container">
    <div class="header-container">
        <h1 class="reports-title">Your Previous Reports</h1>
    </div>

    <table class="reports-table">
        <thead>
            <tr class="table-header">
                <th style="text-align: left;">Report's ID</th>
                <th style="text-align: left;">Title</th>
                <th style="text-align: right;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr class="table-row">
                <td style="text-align: left;">{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('report.show', $report->id) }}" class="see-more-link">SEE MORE</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="new-issue-btn">REPORT A NEW ISSUE</a>

</div>

<style>
    .reports-container {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }


    .reports-title {
        font-size: 34px;
        font-weight: 550;
        color: black;
        margin-bottom: 35px;
        padding-left: 15px;
    }

    .reports-table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-header {
        background-color: #f5f5f5;
        color: #B5B7C0;
        font-weight: 400;
        font-size: 14px;
    }

    .reports-table th {
        padding: 12px 15px;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }

    .table-row {
        border-bottom: 1px solid #eee;
    }

    .table-row:hover {
        background-color: #f9f9f9;
    }

    .reports-table td {
        padding: 12px 15px;
    }

    .see-more-link {
        color: #ffffff;
        text-decoration: none;
        padding: 8px 16px;
        background-color: #000000;
        border-radius: 4px;
        display: inline-block;
        font-size: 14px;
    }

    .see-more-link:hover {
        background-color: #333333;
    }

    .new-issue-btn {
        background-color: #FE5B16;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 300;
        margin-top: 35px;
        margin-left: 15px;
        display: inline-block;
        cursor: pointer;
    }

</style>
@endsection
