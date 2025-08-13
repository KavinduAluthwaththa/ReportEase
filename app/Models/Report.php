<?php

//a dummy report model created for testing the previous report page


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'issue_no',
        'title',
        'description',
        'reporter_name',
        'index_no',
        'reporter_email',
        'date',
        'attachments',
    ];

    // If you want Laravel to automatically cast JSON fields to arrays
    protected $casts = [
        'attachments' => 'array'
    ];
}

