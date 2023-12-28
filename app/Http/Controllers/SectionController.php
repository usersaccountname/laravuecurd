<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sections = Section::when($search, function ($query) use ($search) {
            $query->where('section_code', 'like', '%' . $search . '%')
                ->orWhere('course_id', 'like', '%' . $search . '%')
                ->orWhere('school_year', 'like', '%' . $search . '%')
                ->orWhere('semester', 'like', '%' . $search . '%');
            // Add more search conditions as needed...
        })->get();

        $courses = Course::all();
        $instructors = Instructor::all();
        return view('sections.index', compact('sections', 'search','courses','instructors'));
    }

    public function create()
    {
        // Add logic if needed
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('sections.create', compact('courses','instructors'));
    }

    public function store(Request $request)
    {
        // Validation logic here

        Section::create([
            'section_code' => $request->input('section_code'),
            'course_id' => $request->input('course_id'),
            'instructor_id' => $request->input('instructor_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'day' => $request->input('day'),
            'units' => $request->input('units'),
            'school_year' => $request->input('school_year'),
            'semester' => $request->input('semester'),
            'bldg' => $request->input('bldg'),
            'room' => $request->input('room'),
            'slots' => $request->input('slots'),
            'enrollee' => $request->input('enrollee'),
            'offering' => $request->input('offering'),
            'restriction' => $request->input('restriction', false), // Assuming it's a checkbox in the form
        ]);

        return redirect()->route('sections.index')->with('success', 'Section created successfully!');
    }

    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        // Add logic if needed

        $instructors = Instructor::all();
        return view('sections.edit', compact('section','instructors'));
    }

    public function update(Request $request, Section $section)
    {
        // Validation logic here

        $section->update([
            'instructor_id' => $request->input('instructor_id'),
            'bldg' => $request->input('bldg'),
            'room' => $request->input('room'),
            'slots' => $request->input('slots'),
            'enrollee' => $request->input('enrollee'),
            'offering' => $request->input('offering',false),
            'course' => $request->input('course'),
            'restriction' => $request->input('restriction', false),
        ]);
        return redirect()->route('sections.index')->with('success', 'Section updated successfully!');
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully!');
    }
}
