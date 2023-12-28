<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'section_code',
        'course_id',
        'instructor_id',
        'start_time',
        'end_time',
        'day',
        'units',
        'school_year',
        'semester',
        'bldg',
        'room',
        'slots',
        'enrollee',
        'offering',
        'course',
        'restriction',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
