<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'role_id',
        'section_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_id' => 'integer',
        'section_id' => 'integer',
    ];

    // Relationships
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function reportedIssues()
    {
        return $this->hasMany(Issue::class, 'reported_by_user_id');
    }

    public function assignedIssues()
    {
        return $this->hasMany(Issue::class, 'assigned_to_user_id');
    }

    public function updates()
    {
        return $this->hasMany(IssueUpdate::class);
    }

    public function upvotes()
    {
        return $this->hasMany(IssueUpvote::class);
    }

    public function notifications()
    {
        return $this->hasManyThrough(Notification::class, Notify::class, 'receiver_id', 'notific_id', 'id', 'notific_id');
    }
}
