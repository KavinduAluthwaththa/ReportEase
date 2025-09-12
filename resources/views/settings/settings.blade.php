@extends('layouts.dashboard')

@section('content')
<style>
.settings-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
    min-height: 100vh;
}

.settings-content {
    border-radius: 12px;
    padding: 3rem;
}

.settings-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 3rem;
}

.profile-image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
    position: relative;
}

.profile-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-edit-icon {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background: #ff6600;
    color: white;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    border: 3px solid white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.profile-edit-icon:hover {
    background: #e55a00;
    transform: scale(1.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.form-input {
    width: 100%;
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.form-input:focus {
    outline: none;
    border-color: #ff6600;
    background: white;
}

.form-input:disabled {
    background: #f5f5f5;
    color: #999;
    cursor: not-allowed;
}

.input-container {
    display: flex;
    align-items: center;
    gap: 10px;
}

.input-container .form-input {
    flex: 1;
}

.edit-icon {
    color: #666;
    cursor: pointer;
    font-size: 16px;
    padding: 8px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    flex-shrink: 0;
}

.edit-icon:hover {
    background-color: #f0f0f0;
    color: #ff6600;
}

.save-btn {
    width: 100%;
    background: #ff6600;
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 1rem;
}

.save-btn:hover {
    background: #e55a00;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    border: 1px solid #c3e6cb;
}

.error-message {
    background: #f8d7da;
    color: #721c24;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    border: 1px solid #f5c6cb;
}

/* Readonly fields styling */
.readonly-field {
    background: #f8f9fa !important;
    color: #6c757d;
    border-color: #e9ecef;
}

.readonly-label {
    color: #6c757d;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .settings-content {
        padding: 2rem;
    }
}
</style>

<div class="settings-container">
    <div class="settings-content">
        <h1 class="settings-title">Edit Profile</h1>
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="error-message">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Profile Image -->
        <div class="profile-image-container">
            <div class="profile-image">
                <img src="{{ asset('images/user.png') }}" alt="Profile Picture">
                <div class="profile-edit-icon">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
        </div>
        
        <!-- Settings Form -->
        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            
            <!-- First Name and Last Name Row -->
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <div class="input-container">
                        <input type="text" name="full_name" class="form-input" 
                               value="{{ old('full_name', $user->first_name) }}" 
                               placeholder="Enter your first name">
                        <i class="fas fa-edit edit-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <div class="input-container">
                        <input type="text" name="last_name" class="form-input" 
                               value="{{ old('last_name', $user->last_name) }}" 
                               placeholder="Enter your last name">
                        <i class="fas fa-edit edit-icon"></i>
                    </div>
                </div>
            </div>
            
            <!-- Phone Number -->
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <div class="input-container">
                    <input type="tel" name="phone_number" class="form-input" 
                           value="{{ old('phone_number', $user->phone_number) }}" 
                           placeholder="Enter your phone number">
                    <i class="fas fa-edit edit-icon"></i>
                </div>
            </div>
            
            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-container">
                    <input type="email" name="email" class="form-input" 
                           value="{{ old('email', $user->email) }}" 
                           placeholder="Enter your email address">
                    <i class="fas fa-edit edit-icon"></i>
                </div>
            </div>
            
            <!-- Registration Number (Read Only) -->
            <div class="form-group">
                <label class="form-label readonly-label">Registration number</label>
                <input type="text" class="form-input readonly-field" 
                       value="{{ $user->ID }}" disabled>
            </div>
            
            <!-- User Role (Read Only) -->
            <div class="form-group">
                <label class="form-label readonly-label">Your Role</label>
                <input type="text" class="form-input readonly-field" 
                       value="{{ $user->role->role_name ?? 'Unknown' }}" disabled>
            </div>
            
            <!-- Save Button -->
            <button type="submit" class="save-btn">
                SAVE CHANGES
            </button>
        </form>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection