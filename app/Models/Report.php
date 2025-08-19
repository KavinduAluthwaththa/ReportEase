<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports'; // Assuming your table name is 'reports'

    protected $fillable = [
        // Add fillable attributes here if you have any
        // For example: 'title', 'description', 'user_id'
    ];
}
