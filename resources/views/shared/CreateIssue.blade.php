@extends('layouts.dashboard')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/guest.css') }}">
	<div class="create-issue-wrapper">
		<div class="create-issue-container">
			<h1 class="page-title" style="margin: 32px 0;font-size: 2.5rem;">Report a New Issue</h1>

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
				<input type="file" name="evidence[]" class="form-control" id="evidence" multiple accept=".jpg,.jpeg,.png">
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
	if (input) {
		input.addEventListener('change', function(e) {
			var files = e.target.files;
			var label = document.querySelector('label.custom-file-label[for="evidence"]');

			if (files && files.length > 0) {
				if (files.length === 1) {
					label.textContent = files[0].name;
				} else {
					label.textContent = files.length + ' files selected';
				}
			} else {
				label.textContent = 'Choose files...';
			}
		});
	}
});
</script>
@endpush
