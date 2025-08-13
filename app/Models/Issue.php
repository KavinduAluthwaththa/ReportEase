<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'reporter_name',
        'reporter_email',
        'user_id', // Assuming this is the ID of the user reporting the issue
        'location',
        'reporter_role',
        'status',
        'attachments',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'attachments' => 'json', // If you want to store multiple attachments as JSON
    ];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
    ];
}
