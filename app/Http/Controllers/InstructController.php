<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Section;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InstructController extends Controller
{
    public function index(Request $request)
    {
        $instructors = Instructor::all();
        return view('teachers.dashboard', compact('instructors'));
    }

    public function schedules(Request $request)
    {
        $sections = Section::all();
        $courses = Course::all();

        $semester = $request->input('semester');
        $schoolYear = $request->input('school_year');

        // Use a query builder to filter sections by semester and school year
        $sections = Section::when($semester, function ($query) use ($semester) {
            $query->where('semester', $semester);
        })->when($schoolYear, function ($query) use ($schoolYear) {
            $query->where('school_year', $schoolYear);
        })->get();
        return view('instructors.index', compact('sections', 'courses'));
    }

    public function showLoginForm(Request $request)
    {
        $username = $request->input('username');
        return view('auth.ilogin', compact('username'));
    }

    public function ilogin(Request $request)
    {
        // Validate the login request
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('instructors')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/instrct_dashboard');
        } else {
            // Authentication failed
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function ilogout()
    {
        auth()->guard('instructors')->logout();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
