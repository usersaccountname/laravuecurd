<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'instructor_id',
        'first_name',
        'last_name',
        'username',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($instructor) {
            $latestInstructor = self::latest('instructor_id')->first();

            if ($latestInstructor) {
                // Extract the numeric part, increment it, and pad it
                $numericPart = (int) ltrim($latestInstructor->instructor_id, 'I-');
                $instructor->instructor_id = 'I-' . str_pad($numericPart + 1, 5, '0', STR_PAD_LEFT);
            } else {
                // If there are no existing instructors, start with I-11111
                $instructor->instructor_id = 'I-11111';
            }

            $instructor->password = bcrypt('abcde12345');
        });
    }

    public function teaches()
    {
        return $this->hasMany(Teach::class, 'instructor_id');
    }

}
