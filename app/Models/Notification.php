<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['notific_type', 'notific_head', 'notific_body'];

    public function notifyLogs()
    {
        return $this->hasMany(Notify::class, 'notific_id');
    }
}
