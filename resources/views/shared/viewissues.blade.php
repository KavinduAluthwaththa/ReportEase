@extends('layouts.dashboard')

@section('content')
<!-- Custom CSS for this page -->
<link rel="stylesheet" href="{{ asset('css/viewissues.css') }}">

    <div class="issue-container">
        <h1 class="issue-header">Issue No: <span class="issue-number">IS{{ $issue->id ?? 'T001' }}</span></h1>

        <h2 class="issue-title issue-title-main">{{ $issue->title ?? 'Projector in the NLH is not working' }}</h2>
        
        <p class="issue-description">{{ $issue->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s' }}</p>

        <div class="row info-section">
            <div class="col-md-6">
                <div class="info-item">
                    <p class="info-label">Reporter's Name</p>
                    <p class="info-value">{{ $issue-> user->full_name }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Reporter's email</p>
                    <p class="info-value">{{ $issue->user->email }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Issue Location</p>
                    <p class="info-value">{{ $issue->location }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item">
                    <p class="info-label">Index</p>
                    <p class="info-value">{{ $issue->user->ID }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Date</p>
                    <p class="info-value">{{ isset($issue->reported_at) ? $issue->reported_at->format('d/m/Y') : '21/03/2025' }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Reporter's Role</p>
                    <p class="info-value">{{ $issue->user->role ->role_name }}</p>
                </div>
            </div>
        </div>

        <!-- Attachments Section -->
        <div class="attachment-container">
            <p class="info-label">Attachments</p>
            <div class="attachment-thumbnails">
                <div class="attachment-item">
                    <div class="attachment-thumbnail gradient-1">
                        <i class="fas fa-image attachment-icon"></i>
                    </div>
                    <small class="attachment-filename">sts.jpg</small>
                </div>
                <div class="attachment-item">
                    <div class="attachment-thumbnail gradient-2">
                        <i class="fas fa-image attachment-icon"></i>
                    </div>
                    <small class="attachment-filename">sts2.jpg</small>
                </div>
            </div>
        </div>

        <!-- Status Section -->
        <form action="{{ isset($issue->issue_id) ? route('issue.status', $issue->issue_id) : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <p class="info-label">Issue Status</p>
            <div class="form-dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button type="submit" class="submit-button ">UPDATE</button>
        </form>
    </div>

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom JavaScript for this page -->
    <script src="{{ asset('js/viewissues.js') }}"></script>
@stop

