<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IssueUpdate extends Model
{
    use HasFactory;

    protected $fillable = ['issue_id', 'user_id', 'comment', 'new_status'];

    protected $casts = [
        'issue_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
