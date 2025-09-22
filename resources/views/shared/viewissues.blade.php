@extends('layouts.dashboard')

@section('content')
<!-- Custom CSS for this page -->
<link rel="stylesheet" href="{{ asset('css/viewissues.css') }}">

    <div class="issue-container">
        <h1 class="issue-header">Issue No: <span class="issue-number">IS{{ $issue->issue_id ?? 'T001' }}</span></h1>

        <h2 class="issue-title issue-title-main">{{ $issue->title ?? 'Projector in the NLH is not working' }}</h2>
        
        <p class="issue-description">{{ $issue->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s' }}</p>

        <div class="row info-section">
            <div class="col-md-6">
                <div class="info-item">
                    <p class="info-label">Reporter's Name</p>
                    <p class="info-value">{{ $issue->user->full_name ?? 'Samanalee Fernando' }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Reporter's email</p>
                    <p class="info-value">{{ $issue->user->email ?? 'samanalee@gmail.com' }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Issue Location</p>
                    <p class="info-value">{{ $issue->location ?? 'NLH' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item">
                    <p class="info-label">User ID</p>
                    <p class="info-value">{{ $issue->user->ID ?? '21CIS004' }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Reported Date</p>
                    <p class="info-value">{{ isset($issue->reported_at) ? $issue->reported_at->format('d/m/Y') : '21/03/2025' }}</p>
                </div>
                <div class="info-item">
                    <p class="info-label">Reporter's Role</p>
                    <p class="info-value">{{ $issue->user->role->role_name ?? 'Admin' }}</p>
                </div>
            </div>
        </div>

        <!-- Attachments Section -->
        <div class="attachment-container">
            <p class="info-label">Attachments</p>
            <div class="attachment-grid">
                @if(isset($issue->images) && $issue->images->count() > 0)
                    @foreach($issue->images as $index => $image)
                        <div class="attachment-item">
                            <div class="attachment-thumbnail-43" onclick="openImageModal('{{ asset('storage/' . $image->original_path) }}', 'Evidence Image {{ $index + 1 }}')">
                                <img src="{{ asset('storage/' . $image->thumbnail_path) }}" alt="Evidence Image {{ $index + 1 }}" class="attachment-image">
                                <div class="attachment-overlay">
                                    <i class="fas fa-search-plus overlay-icon"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="attachment-item">
                        <div class="attachment-thumbnail-43 no-attachment">
                            <i class="fas fa-image attachment-icon"></i>
                            <small class="attachment-filename">No attachments</small>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Image Modal -->
        <div id="imageModal" class="image-modal" onclick="closeImageModal()">
            <div class="modal-content">
                <span class="close-btn" onclick="closeImageModal()">&times;</span>
                <img id="modalImage" src="" alt="" class="modal-image">
                <div class="modal-caption">
                    <span id="modalCaption"></span>
                </div>
            </div>
        </div>

        <!-- Status Section -->
        @php
            $role = session('user_role');
            $canUpdateStatus = in_array($role, ['Admin', 'Faculty Staff', 'Maintenance Department']);
        @endphp
        <p class="info-label">Issue Status: <span class="current-status">{{ $issue->status ?? 'Under Review' }}</span></p>
        @if($canUpdateStatus)
            <form action="{{ route('issues.update', $issue->issue_id ?? 'T001') }}" method="POST">
                @csrf
                <div class="form-dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if($role === 'Faculty Staff')
                            <button class="dropdown-item" type="submit" name="action" value="accepted">Accept</button>
                            <button class="dropdown-item" type="submit" name="action" value="under_review">Under Review</button>
                            <button class="dropdown-item" type="submit" name="action" value="rejected">Reject</button>
                        @else
                            <!-- Admin and Maintenance Department get full access -->
                            <button class="dropdown-item" type="submit" name="action" value="accepted">Accept</button>
                            <button class="dropdown-item" type="submit" name="action" value="under_review">Under Review</button>
                            <button class="dropdown-item" type="submit" name="action" value="being_resolved">Being Resolved</button>
                            <button class="dropdown-item" type="submit" name="action" value="resolved">Mark as Resolved</button>
                            <button class="dropdown-item" type="submit" name="action" value="rejected">Reject</button>
                        @endif
                    </div>
                </div>
                <br>
                <button type="submit" class="submit-button">UPDATE</button>
            </form>
        @endif
    </div>

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom JavaScript for this page -->
    <script src="{{ asset('js/viewissues.js') }}"></script>
    
    <script>
    function openImageModal(imageSrc, caption) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        
        modal.style.display = 'block';
        modalImg.src = imageSrc;
        modalCaption.textContent = caption;
        
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }
    
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.style.display = 'none';
        
        // Restore body scroll
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when pressing Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageModal();
        }
    });
    
    // Prevent modal from closing when clicking on the image
    document.getElementById('modalImage').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    </script>
@stop
