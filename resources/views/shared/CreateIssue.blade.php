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
				<label class="info-label">Upload up to 3 evidence images (JPG/PNG, max 2MB each)</label>
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
document.addEventListener('DOMContentLoaded', function() {
	var input = document.getElementById('evidence');
	var uploadArea = document.querySelector('.file-upload-area');
	var fileList = document.getElementById('fileList');

	console.log('Elements found:', {input: !!input, uploadArea: !!uploadArea, fileList: !!fileList});

	if (input && uploadArea && fileList) {
		// Handle file selection
		input.addEventListener('change', function(e) {
			console.log('Files selected:', e.target.files.length);
			displayFiles(e.target.files);
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
			input.files = e.dataTransfer.files;
			displayFiles(e.dataTransfer.files);
		});

		function displayFiles(files) {
			console.log('Displaying files:', files.length);
			fileList.innerHTML = '';
			if (files && files.length > 0) {
				for (let i = 0; i < files.length; i++) {
					const file = files[i];
					createFilePreview(file, i);
				}
			}
		}

		function createFilePreview(file, index) {
			console.log('Creating preview for:', file.name, file.type);
			const fileItem = document.createElement('div');
			fileItem.className = 'file-item';
			
			// Check if file is an image
			if (file.type.startsWith('image/')) {
				const reader = new FileReader();
				reader.onload = function(e) {
					fileItem.innerHTML = `
						<div class="file-preview-container">
							<img src="${e.target.result}" alt="Preview" class="file-preview-image">
						</div>
						<div class="file-info">
							<div class="file-details">
								<span class="file-name">${file.name}</span>
								<span class="file-size">${formatFileSize(file.size)}</span>
							</div>
							<button type="button" class="file-remove" onclick="removeFile(${index})">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<line x1="18" y1="6" x2="6" y2="18"></line>
									<line x1="6" y1="6" x2="18" y2="18"></line>
								</svg>
							</button>
						</div>
					`;
				};
				reader.readAsDataURL(file);
			} else {
				// Non-image file
				fileItem.innerHTML = `
					<svg class="file-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
						<polyline points="14,2 14,8 20,8"></polyline>
						<line x1="16" y1="13" x2="8" y2="13"></line>
						<line x1="16" y1="17" x2="8" y2="17"></line>
					</svg>
					<div class="file-info">
						<div class="file-details">
							<span class="file-name">${file.name}</span>
							<span class="file-size">${formatFileSize(file.size)}</span>
						</div>
						<button type="button" class="file-remove" onclick="removeFile(${index})">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<line x1="18" y1="6" x2="6" y2="18"></line>
								<line x1="6" y1="6" x2="18" y2="18"></line>
							</svg>
						</button>
					</div>
				`;
			}
			
			fileList.appendChild(fileItem);
		}

		function formatFileSize(bytes) {
			if (bytes === 0) return '0 Bytes';
			const k = 1024;
			const sizes = ['Bytes', 'KB', 'MB', 'GB'];
			const i = Math.floor(Math.log(bytes) / Math.log(k));
			return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
		}

		// Make displayFiles globally accessible for removeFile function
		window.displayFiles = displayFiles;
	}

	// Global function for removing files
	window.removeFile = function(index) {
		console.log('Removing file at index:', index);
		const input = document.getElementById('evidence');
		const files = Array.from(input.files);
		files.splice(index, 1);
		
		// Create new FileList
		const dt = new DataTransfer();
		files.forEach(file => dt.items.add(file));
		input.files = dt.files;
		
		// Refresh display
		if (window.displayFiles) {
			window.displayFiles(input.files);
		}
	};
});
</script>
@endpush
