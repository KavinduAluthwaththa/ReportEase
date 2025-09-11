<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'original_path',
        'thumbnail_path'
    ];

    // Relationship to Issue
    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id', 'issue_id');
    }
}
