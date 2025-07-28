<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IssueController extends Controller
{
    // Update Issue Status
    public function UpdateIssueStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|string',
        ]);

        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Update the issue status
        $issue->status = $request->input('status');
        $issue->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Issue status updated successfully.');
    }
}
