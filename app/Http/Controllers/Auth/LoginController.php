<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect users based on their type after login
    protected function authenticated(Request $request, $user)
    {
        // if ($user->isStudent()) {
        //     return redirect()->route('slogin'); // Redirect for students
        // } elseif ($user->isDirector()) {
        //     return redirect()->route('dlogin'); // Redirect for directors
        // }

        // // Default redirect for other cases
        // return redirect()->intended($this->redirectPath());
    }

    // ...
}
