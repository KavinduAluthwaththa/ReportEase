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
            // Find the issue with relationships loaded
            $issue = Issue::with(['reporter.role', 'reporter.section', 'assignee.role'])
                          ->where('issue_id', $id)
                          ->firstOrFail();
            
            return view('shared.viewissues', compact('issue'));
        } catch (\Exception $e) {
            // For now, show with sample data when no database
            $issue = (object) [
                'issue_id' => $id,
                'title' => 'Projector in the NLH is not working',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'location' => 'NLH',
                'status' => 'pending',
                'upVotes' => 5,
                'reported_at' => now(),
                'resolved_at' => null,
                'user' => (object) [
                    'full_name' => 'Samanalee Fernando',
                    'email' => 'samanalee@gmail.com',
                    'ID' => '21CIS004',
                    'phone_number' => '0771234567',
                    'role' => (object) [
                        'role_name' => 'Student'
                    ],
                    'section' => (object) [
                        'section_name' => 'Computer Science'
                    ]
                ],
                'assignee' => null,
                'evidence' => 'projector_issue1.jpg,projector_issue2.jpg'
            ];
            return view('shared.viewissues', compact('issue'));
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
            // Find the issue by ID using the correct primary key
            $issue = Issue::where('issue_id', $id)->firstOrFail();

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
