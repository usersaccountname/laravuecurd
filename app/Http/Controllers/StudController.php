<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();
        return view('learners.dashboard', compact('students'));
    }

    public function schedules(Request $request)
    {
        $sections = Section::all();
        $courses = Course::all();


        // Get the currently authenticated student's ID
        $id = Auth::id();

        $semester = $request->input('semester');
        $school_year = $request->input('school_year');

        // Use a query builder to filter sections by semester and school year
        $enrolls = Enroll::with(['section.course', 'student'])
            ->where('student_id', $id)
            ->whereHas('section', function ($query) use ($school_year, $semester) {
                $query->where('school_year', $school_year)
                    ->where('semester', $semester);
            })
            ->get();


        // printf($enrolls);

        return view('learners.schedule', compact('enrolls','sections','courses'));
    }

    public function fees(Request $request)
    {
        $sections = Section::all();
        $courses = Course::all();

        // Get the currently authenticated student's ID
        $id = Auth::id();

        $semester = $request->input('semester');
        $school_year = $request->input('school_year');

        // Use the Enroll query to get the student's schedules
        $enrolls = Enroll::with(['section.course', 'student'])
            ->where('student_id', $id)
            ->whereHas('section', function ($query) use ($school_year, $semester) {
                $query->where('school_year', $school_year)
                    ->where('semester', $semester);
            })
            ->get();

        // printf($enrolls);

        return view('learners.fee', compact('enrolls','sections','courses'));
    }
    // Add the following login methods

    public function showLoginForm(Request $request)
    {
        $username = $request->input('username');

        return view('auth.slogin', compact('username'));

    }

    public function slogin(Request $request)
    {
        // Validate the login request
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


            $credentials = $request->only('username', 'password');

            if (Auth::guard('students')->attempt($credentials)) {
                // Authentication passed
                return redirect()->intended('/s_dash');
            }
            else {
                // Authentication failed
                return back()->withErrors(['username' => 'Invalid credentials']);
            }

    }


    public function slogout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

        public function showSchedule()
    {
        $enrolls = Enroll::with(['course', 'section'])->where('student_id', auth()->user()->id)->get();
        return view('learners.schedule', compact('enrolls'));
    }


}
