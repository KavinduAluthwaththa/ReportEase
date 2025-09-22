@extends('layouts.dashboard')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/guest.css') }}">
	<link rel="stylesheet" href="{{ asset('css/guest.css') }}">
	<div class="create-issue-wrapper">
		<div class="create-issue-container">
			<h1 class="page-title" style="margin: 32px 0;font-size: 2.5rem;">Report a <span style="color: #e67e22;">New Issue</span></h1>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul style="margin:0; padding-left:18px;">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form action="{{ route('issues.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="form-group">
				<label class="info-label">Issue Title</label>
				<input type="text" name="title" class="form-control" placeholder="XXXXXXXXXX" value="{{ old('title') }}" required>
			</div>

			<div class="form-group">
				<label class="info-label">Issue Description</label>
				<textarea name="description" class="form-control" placeholder="XXXXXXXXXX" rows="5" required>{{ old('description') }}</textarea>
			</div>

			<div class="form-group">
				<label class="info-label">Location of the Issue</label>
				<input type="text" name="location" class="form-control" placeholder="e.g., Building A, Room 101, Main Hall" value="{{ old('location') }}" required>
			</div>

			<div class="form-group">
				<label class="info-label">Upload an Image for Evidence  (JPG/PNG, max 2MB each)</label>
				<div class="file-upload-container">
					<input type="file" name="evidence[]" id="evidence" multiple accept=".jpg,.jpeg,.png" class="file-input">
					<label for="evidence" class="file-upload-area">
						<div class="upload-icon">
							<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
								<polyline points="7,10 12,15 17,10"></polyline>
								<line x1="12" y1="15" x2="12" y2="3"></line>
							</svg>
						</div>
						<div class="upload-text">
							<span class="upload-title">Click to upload or drag and drop</span>
							<span class="upload-subtitle">JPG, PNG files (max 2MB each)</span>
						</div>
					</label>
					<div class="file-list" id="fileList"></div>
				</div>
			</div>

			<div style="margin-top:24px;">
				<button type="submit" class="submit-button submit-button-full-width">SUBMIT</button>
			</div>
		</form>
		</div>
	</div>
@stop

@push('scripts')
<script>
// Ensure DOM is ready and run immediately
(function() {
    'use strict';
    
    function initFileUpload() {
        console.log('Initializing file upload...');
        
        const input = document.getElementById('evidence');
        const uploadArea = document.querySelector('.file-upload-area');
        const fileList = document.getElementById('fileList');
        
        console.log('Elements check:', {
            input: input ? 'found' : 'not found',
            uploadArea: uploadArea ? 'found' : 'not found', 
            fileList: fileList ? 'found' : 'not found'
        });
        
        if (!input || !uploadArea || !fileList) {
            console.error('Required elements not found');
            return;
        }
        
        // Handle file selection
        input.addEventListener('change', function(e) {
            console.log('File change event triggered, files:', e.target.files.length);
            handleFiles(e.target.files);
        });
        
        // Handle drag and drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            input.files = files;
            handleFiles(files);
        });
        
        function handleFiles(files) {
            console.log('Handling files:', files.length);
            
            // Clear previous previews
            fileList.innerHTML = '';
            
            if (!files || files.length === 0) {
                console.log('No files to display');
                return;
            }
            
            // Process each file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                console.log('Processing file:', file.name, file.type, file.size);
                createPreview(file, i);
            }
        }
        
        function createPreview(file, index) {
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item';
            fileItem.style.marginBottom = '12px';
            
            console.log('Creating preview for:', file.name, 'Type:', file.type);
            
            if (file.type && file.type.startsWith('image/')) {
                console.log('Processing as image');
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('FileReader loaded successfully');
                    
                    fileItem.innerHTML = `
                        <div class="file-preview-container">
                            <img src="${e.target.result}" alt="Preview of ${file.name}" class="file-preview-image" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="file-info">
                            <div class="file-details">
                                <span class="file-name">${file.name}</span>
                                <span class="file-size">${formatBytes(file.size)}</span>
                            </div>
                            <button type="button" class="file-remove" onclick="removeFileAtIndex(${index})" style="margin-left: 10px;">
                                ✕
                            </button>
                        </div>
                    `;
                };
                
                reader.onerror = function() {
                    console.error('FileReader error for:', file.name);
                };
                
                reader.readAsDataURL(file);
            } else {
                console.log('Processing as non-image file');
                fileItem.innerHTML = `
                    <div class="file-info">
                        <div class="file-details">
                            <span>📄</span>
                            <span class="file-name">${file.name}</span>
                            <span class="file-size">${formatBytes(file.size)}</span>
                        </div>
                        <button type="button" class="file-remove" onclick="removeFileAtIndex(${index})">
                            ✕
                        </button>
                    </div>
                `;
            }
            
            fileList.appendChild(fileItem);
            console.log('Preview added to DOM');
        }
        
        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Make functions globally available
        window.handleFiles = handleFiles;
        window.formatBytes = formatBytes;
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFileUpload);
    } else {
        initFileUpload();
    }
    
    // Global function for removing files
    window.removeFileAtIndex = function(index) {
        console.log('Removing file at index:', index);
        const input = document.getElementById('evidence');
        if (!input || !input.files) return;
        
        const filesArray = Array.from(input.files);
        filesArray.splice(index, 1);
        
        // Create new FileList
        const dt = new DataTransfer();
        filesArray.forEach(file => dt.items.add(file));
        input.files = dt.files;
        
        // Refresh display
        if (window.handleFiles) {
            window.handleFiles(input.files);
        }
    };
})();
</script>
@endpush
