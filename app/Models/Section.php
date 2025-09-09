<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $table = 'Section';
    protected $primaryKey = 'section_id';
    public $incrementing = true;

    protected $fillable = ['section_name', 'description'];

    protected $casts = [
        'section_id' => 'integer',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'section_id', 'section_id');
    }
}
