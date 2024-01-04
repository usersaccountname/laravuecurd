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
        $courses = Course::all();


        // Get the currently authenticated student's ID
        $instructor_id = Auth::id();
// echo $instructor_id;
        $semester = $request->input('semester');
        $school_year = $request->input('school_year');

        // // Use a query builder to filter sections by semester and school year
        $sections = Section::where('instructor_id', $instructor_id)
        ->where('semester', $semester)
        ->where('school_year', $school_year)
        ->get();
            // echo $sections;
        return view('teachers.index', compact('sections', 'courses'));
    }

    public function salaries(Request $request)
    {
        $courses = Course::all();
        // Get the currently authenticated instructor's ID
        $instructor_id = Auth::id();

        $semester = $request->input('semester');
        $school_year = $request->input('school_year');

        // Use the Section query to get the instructor's sections and related information
        $sections = Section::where('instructor_id', $instructor_id)
        ->where('semester', $semester)
        ->where('school_year', $school_year)
        ->get();
        // echo $sections;
        return view('teachers.salary', compact('sections','courses'));
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
            return redirect()->intended('/i_dash');
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
