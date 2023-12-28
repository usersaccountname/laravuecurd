<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'student_id',
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

        static::creating(function ($student) {
            $latestStudent = self::latest('student_id')->first();

            if ($latestStudent) {
                // Extract the numeric part, increment it, and pad it
                $numericPart = (int) ltrim($latestStudent->student_id, 'S-');
                $student->student_id = 'S-' . str_pad($numericPart + 1, 5, '0', STR_PAD_LEFT);
            } else {
                // If there are no existing instructors, start with I-11111
                $student->student_id = 'S-11111';
            }

            $student->password = bcrypt('abcde54321');
        });
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
