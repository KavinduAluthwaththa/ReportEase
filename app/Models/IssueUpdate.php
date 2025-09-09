<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IssueUpdate extends Model
{
    use HasFactory;

    protected $table = 'Issue_Updates';
    protected $primaryKey = 'update_id';

    protected $fillable = ['issue_id', 'user_id', 'comment', 'new_status'];

    protected $casts = [
        'issue_id' => 'integer',
        'user_id' => 'integer',
        'created_at' => 'datetime',
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
