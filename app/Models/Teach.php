<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'instructor_id',
        'validated'
    ];

    // Define relationships if needed
    public function section()
    {
        return $this->belongsTo(Section::class, 'instructor_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'id');
    }
}
