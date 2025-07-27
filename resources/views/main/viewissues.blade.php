@extends('layouts.dashboard')

@section('content')
<style>
    .info-label {
        color: #6c757d;
        font-size: 12px;
        margin-bottom: 2px;
        font-weight: normal;
    }
    .info-value {
        color: #333;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 14px;
    }
    .issue-number {
        color: #e67e22;
        font-weight: bold;
    }
    .issue-title {
        color: #333;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .issue-description {
        font-size: 20px;
        color: #6c757d;
        line-height: 1.5;
        margin-bottom: 25px;
    }
</style>

    <div class="w-5/6 p-10">
        <h1 style="font-size: 45px; margin-bottom: 20px;">Issue No: <span class="issue-number">IS{{ $issue->id ?? 'T001' }}</span></h1>

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
            </div>
        </div>

        <!-- Attachments Section -->
        <div style="margin-bottom: 25px;">
            <p class="info-label">Attachments</p>
            <div style="display: flex; gap: 15px;">
                <div style="text-align: center;">
                    <div style="width: 80px; height: 60px; background: linear-gradient(45deg, #00d4aa, #00a8ff); border-radius: 4px; display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">
                        <i class="fas fa-image" style="color: white; font-size: 20px;"></i>
                    </div>
                    <small style="color: #6c757d; font-size: 11px;">sts.jpg</small>
                </div>
                <div style="text-align: center;">
                    <div style="width: 80px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 4px; display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">
                        <i class="fas fa-image" style="color: white; font-size: 20px;"></i>
                    </div>
                    <small style="color: #6c757d; font-size: 11px;">sts2.jpg</small>
                </div>
            </div>
        </div>

        <!-- Status Section -->
        <div style="margin-bottom: 25px;">
            <p class="info-label">Status</p>
            <p class="info-value">{{ $issue->status ?? 'Faculty Administration' }}</p>
        </div>

        <!-- Action Form -->
        <form action="{{ isset($issue->id) ? route('issues.update', $issue->id) : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <div style="position: relative; display: inline-block;">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="min-width: 120px; border-color: #6c757d;">
                    Click Here
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="submit" name="action" value="accept">Accept</button></li>
                    <li><button class="dropdown-item" type="submit" name="action" value="send_to_maintenance">Send to Maintenance</button></li>
                    <li><button class="dropdown-item" type="submit" name="action" value="change_request">Change request</button></li>
                    <li><button class="dropdown-item" type="submit" name="action" value="reject">Reject</button></li>
                </ul>
            </div>
            <button type="submit" style="background-color: #e67e22; color: white; border: none; padding: 8px 24px; margin-left: 15px; border-radius: 4px; font-weight: 600;">SUBMIT</button>
        </form>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@stop

