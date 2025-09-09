<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IssueUpvote extends Model
{
    use HasFactory;

    protected $table = 'Issue_Upvote';
    protected $primaryKey = 'upvote_id';
    public $incrementing = false;

    protected $fillable = ['upvote_id', 'issue_id', 'user_id'];

    protected $casts = [
        'upvote_id' => 'integer',
        'issue_id' => 'string',
        'user_id' => 'string',
    ];

    public $timestamps = false;

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id', 'issue_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
