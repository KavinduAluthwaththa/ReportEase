<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notify extends Model
{
    use HasFactory;

    protected $table = 'notify';
    protected $fillable = ['notific_id', 'receiver_id', 'notific_sent_time', 'notific_seen_time'];

    protected $casts = [
        'notific_id' => 'integer',
        'receiver_id' => 'integer',
        'notific_sent_time' => 'datetime',
        'notific_seen_time' => 'datetime',
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notific_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
