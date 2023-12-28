<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Director extends Authenticatable
{
    use HasFactory;

    protected $guard = 'directors';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        // Add other fields as needed
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($director) {
            $director->password = bcrypt('MainUser');
        });
    }
}
