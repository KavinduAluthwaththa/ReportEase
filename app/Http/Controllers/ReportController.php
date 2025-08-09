<?php

namespace App\Http\Controllers;
use App\Models\PreviousReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch all reports from DB
        $reports = PreviousReport::all();

        return view('previous-report.previousReport', compact('reports'));
    }

    public function show($id)
    {
        $report = PreviousReport::findOrFail($id);
        return view('previous-report.show', compact('report'));
    }



}
