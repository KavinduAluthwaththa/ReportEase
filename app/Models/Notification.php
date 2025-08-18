<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'Notifications';
    protected $primaryKey = 'notific_id';
    public $incrementing = false;

    protected $fillable = ['notific_id', 'notific_type', 'notific_head', 'notific_body'];

    protected $casts = [
        'notific_id' => 'integer',
    ];

    public $timestamps = false;

    public function notifyLogs()
    {
        return $this->hasMany(Notify::class, 'notific_id', 'notific_id');
    }
}
