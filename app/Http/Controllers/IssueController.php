<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Issue;

class IssueController extends Controller
{
    // Update Issue Status
    public function UpdateIssueStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'action' => 'required|string|in:accept,send_to_maintenance,change_request,reject',
        ]);

        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Map action to status
        $statusMap = [
            'accept' => 'accepted',
            'send_to_maintenance' => 'maintenance',
            'change_request' => 'change_requested',
            'reject' => 'rejected',
        ];

        // Update the issue status
        $issue->status = $statusMap[$request->input('action')];
        $issue->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Issue status updated successfully.');
    }
}
