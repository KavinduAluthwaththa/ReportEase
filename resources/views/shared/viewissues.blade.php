@extends('layouts.dashboard')

@section('content')
<!-- Custom CSS for this page -->
<link rel="stylesheet" href="{{ asset('css/viewissues.css') }}">

    <div class="w-5/6 p-10">
        <h1 style="font-size: 45px; margin-bottom: 20px; font-weight: bold;">Issue No: <span class="issue-number">IS{{ $issue->id ?? 'T001' }}</span></h1>

        <h2 class="issue-title" style="font-size: 30px;">{{ $issue->title ?? 'Projector in the NLH is not working' }}</h2>
        
        <p class="issue-description">{{ $issue->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s' }}</p>

        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Reporter's Name</p>
                    <p class="info-value">{{ $issue->reporter_name ?? 'Samanalee Fernando' }}</p>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Reporter's email</p>
                    <p class="info-value">{{ $issue->reporter_email ?? 'samanalee@gmail.com' }}</p>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Issue Location</p>
                    <p class="info-value">{{ $issue->location ?? 'NLH' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Index</p>
                    <p class="info-value">{{ $issue->student_id ?? '21CIS004' }}</p>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Date</p>
                    <p class="info-value">{{ isset($issue->created_at) ? $issue->created_at->format('d/m/Y') : '21/03/2025' }}</p>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="info-label">Reporter's Role</p>
                    <p class="info-value">{{ $issue->reporter_role ?? 'Student' }}</p>
                </div>
            </div>
        </div>

        <!-- Attachments Section -->
        <div style="margin-bottom: 25px;">
            <p class="info-label">Attachments</p>
            <div style="display: flex; gap: 15px;">
                <div style="text-align: center;">
                    <div style="width: 100px; height: 80px; background: linear-gradient(45deg, #00d4aa, #00a8ff); border-radius: 4px; display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">
                        <i class="fas fa-image" style="color: white; font-size: 20px;"></i>
                    </div>
                    <small style="color: #6c757d; font-size: 11px;">sts.jpg</small>
                </div>
                <div style="text-align: center;">
                    <div style="width: 100px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 4px; display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">
                        <i class="fas fa-image" style="color: white; font-size: 20px;"></i>
                    </div>
                    <small style="color: #6c757d; font-size: 11px;">sts2.jpg</small>
                </div>
            </div>
        </div>

        <!-- Status Section -->
        <form action="{{ isset($issue->id) ? route('issues.update', $issue->id) : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <p class="info-label">Issue Status</p>
            <div class="dropdown" style="display: inline-block; margin-bottom: 15px;">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="min-width: 120px; border-color: #6c757d;">
                    Click Here
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" type="submit" name="action" value="accept">Accept</button>
                    <button class="dropdown-item" type="submit" name="action" value="send_to_maintenance">Send to Maintenance</button>
                    <button class="dropdown-item" type="submit" name="action" value="change_request">Change request</button>
                    <button class="dropdown-item" type="submit" name="action" value="reject">Reject</button>
                </div>
            </div>
            <br>
            <button type="submit" style="background-color: #e67e22; color: white; border: none; padding: 8px 24px; border-radius: 4px; font-weight: 600;">UPDATE</button>
        </form>
    </div>

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        $(document).ready(function() {
            // Initialize dropdown
            $('.dropdown-toggle').dropdown();
            
            // Handle dropdown item clicks
            $('.dropdown-item').click(function(e) {
                e.preventDefault();
                var action = $(this).attr('value');
                var form = $(this).closest('form');
                
                // Create hidden input for the action
                var hiddenInput = $('<input>').attr({
                    type: 'hidden',
                    name: 'action',
                    value: action
                });
                
                // Remove any existing action input
                form.find('input[name="action"]').remove();
                
                // Add the new action input and submit
                form.append(hiddenInput);
                form.submit();
            });
        });
    </script>
@stop

