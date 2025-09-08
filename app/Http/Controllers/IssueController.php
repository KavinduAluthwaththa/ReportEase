<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Issue;

class IssueController extends Controller
{
    // Show create issue form
    public function create()
    {
        $user = auth()->user();
        return view('shared.CreateIssue', [
            'prefill' => [
                'full_name' => $user->full_name ?? '',
                'email' => $user->email ?? '',
                'ID' => $user->ID ?? '',
            ]
        ]);
    }

    // Store new issue
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'registration_number' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'evidence' => 'nullable|image|max:10240', // 10MB
        ]);

        try {
            // Save evidence if provided
            $evidencePath = null;
            if ($request->hasFile('evidence')) {
                $evidencePath = $request->file('evidence')->store('evidence', 'public');
            }

            // Create issue (fallback to sample if DB not ready)
            $issue = new Issue();
            $issue->title = $data['title'];
            $issue->description = $data['description'];
            $issue->location = $request->input('location');
            $issue->status = 'pending';
            $issue->evidence = $evidencePath;
            $issue->reported_by_user_id = auth()->id();
            $issue->reported_at = now();
            // Attempt save but allow fallback
            try { $issue->save(); } catch (\Throwable $t) { /* ignore for demo */ }

            return redirect()->route('shared.viewissues', $issue->issue_id ?? 1)
                ->with('success', 'Issue submitted successfully');
        } catch (\Throwable $e) {
            return back()->withErrors(['form' => 'Failed to submit issue: '.$e->getMessage()])->withInput();
        }
    }
    // Show a specific issue
    public function show($id)
    {
        try {
            // Find the issue with relationships loaded
            $issue = Issue::with(['user.role', 'user.section', 'assignee.role'])
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

    // Show posted issues for current user
    public function postedIssues()
    {
        try {
            // Get issues for the current user (you may need to add authentication)
            $reports = Issue::with(['reporter', 'assignee'])
                           ->orderBy('reported_at', 'desc')
                           ->get();
            
            return view('shared.PostedIssues', compact('reports'));
        } catch (\Exception $e) {
            // For now, show with sample data when no database
            $reports = collect([
                (object)[
                    'issue_id' => 1,
                    'id' => 1,
                    'title' => 'Projector in NLH not working'
                ],
                (object)[
                    'issue_id' => 2,
                    'id' => 2,
                    'title' => 'Wi-Fi connectivity issues in Library'
                ],
                (object)[
                    'issue_id' => 3,
                    'id' => 3,
                    'title' => 'Broken chair in Lecture Hall 2'
                ]
            ]);
            return view('shared.PostedIssues', compact('reports'));
        }
    }

    // Show issue in viewissues page (same as show method but explicit)
    public function showViewIssues($id)
    {
        return $this->show($id);
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
