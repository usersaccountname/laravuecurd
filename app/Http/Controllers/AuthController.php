<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AuthController extends Authenticatable
{
    public function showLoginForm(Request $request)
    {
        $username = $request->input('username');
        return view('auth.login',compact('username'));
    }

    // public function login(Request $request)
    // {
    //      // Validate the login request
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // Attempt to authenticate the user
    //     $user = Student::where('username', $request->username)->first();

    //     if ($user && Hash::check($request->password, $user->password)) {
    //         // Authentication successful
    //         // auth()->login($user);
    //         // return redirect('/dashboard'); // Change the redirect path as needed
    //         echo "Right User";
    //     }

    //     // Authentication failed
    //     return back()->withErrors(['username' => 'Invalid credentials']);
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('students')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = Student::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $this->hashMcryptPassword($request->password),
        ]);

        // Log in the new user
        auth()->login($user);

        return redirect('/dashboard'); // Change the redirect path as needed
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    // Helper function to verify mcrypt hashed password
    private function verifyMcryptPassword($password, $hashedPassword)
    {
        return hash_equals($hashedPassword, bcrypt($password, $hashedPassword));
    }

    // Helper function to hash password with mcrypt
    private function hashMcryptPassword($password)
    {
        $salt = substr(str_replace('+', '.', base64_encode(sha1(mt_rand(), true))), 0, 22);
        return crypt($password, '$2a$10$' . $salt);
    }
}
