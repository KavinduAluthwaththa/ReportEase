<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch all reports from DB
        $reports = Report::all();

        return view('previous-report.previousReport', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('previous-report.show', compact('report'));
    }



}
