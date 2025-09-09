<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'Issues';
    protected $primaryKey = 'issue_id';

    protected $fillable = [
        'title', 'description', 'evidence', 'location', 'status',
        'assigned_to_user_id', 'reported_by_user_id', 'reported_at', 'resolved_at', 'upVotes'
    ];

    protected $casts = [
        'reported_at' => 'datetime',
        'resolved_at' => 'datetime',
        'upVotes' => 'integer',
        'assigned_to_user_id' => 'integer',
        'reported_by_user_id' => 'integer',
    ];

    public $timestamps = false;

    // Relationships
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by_user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reported_by_user_id', 'user_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id', 'user_id');
    }

    public function updates()
    {
        return $this->hasMany(IssueUpdate::class, 'issue_id', 'issue_id');
    }

    public function upvotes()
    {
        return $this->hasMany(IssueUpvote::class, 'issue_id', 'issue_id');
    }
}
