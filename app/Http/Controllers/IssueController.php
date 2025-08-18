<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Issue;

class IssueController extends Controller
{
    // Show a specific issue
    public function show($id)
    {
        try {
            // Try to find the issue (when database is ready)
            $issue = Issue::findOrFail($id);
            return view('main.viewissues', compact('issue'));
        } catch (\Exception $e) {
            // For now, show with sample data when no database
            $issue = (object) [
                'id' => $id,
                'title' => 'Projector in the NLH is not working',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'reporter_name' => 'Samanalee Fernando',
                'reporter_email' => 'samanalee@gmail.com',
                'student_id' => '21CIS004',
                'location' => 'NLH',
                'reporter_role' => 'Student',
                'status' => 'pending',
                'created_at' => now()
            ];
            return view('main.viewissues', compact('issue'));
        }
    }

    // Update Issue Status
    public function UpdateIssueStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'action' => 'required|string|in:accept,send_to_maintenance,change_request,reject',
        ]);

        try {
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
        } catch (\Exception $e) {
            // For now, just redirect back with a message when no database
            return redirect()->back()->with('success', 'Action recorded: ' . ucfirst(str_replace('_', ' ', $request->input('action'))));
        }
    }
}
