<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Use a query builder to search by course_code or course_desc
        $courses = Course::when($search, function ($query) use ($search) {
            $query->where('course_code', 'like', '%' . $search . '%')
                ->orWhere('course_desc', 'like', '%' . $search . '%');
        })->get();

        // $courses = Course::all();
        return view('courses.index', compact('courses', 'search'));
    }
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|unique:courses',
            'course_desc' => 'required',
            'price' => 'required',
            // Add other validation rules as needed
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_code' => 'required|unique:courses,course_code,' . $course->id,
            'course_desc' => 'required',
            'price' => 'required',
            // Add other validation rules as needed
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
