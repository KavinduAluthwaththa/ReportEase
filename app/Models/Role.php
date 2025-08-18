<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'Roles';
    protected $primaryKey = 'role_id';
    public $incrementing = false;

    protected $fillable = ['role_id', 'role_name'];

    protected $casts = [
        'role_id' => 'integer',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}
