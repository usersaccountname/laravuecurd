<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Section;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function index(Request $request)
    {
        $studentId = $request->input('student_id');
        $students = Student::when($studentId, function ($query) use ($studentId) {
            $query->where(strtolower('student_id'), 'like', '%' . strtoLower($studentId) . '%');
        })->first();
        $id = $students ? $students->id : null;

        $school_year = $request->input('school_year');
        $semester = $request->input('semester');


        $enrolls = Enroll::with(['section.course', 'student'])
            ->where('student_id', $id)
            ->whereHas('section', function ($query) use ($school_year, $semester) {
                $query->where('school_year', $school_year)
                    ->where('semester', $semester);
            })
            ->get();

        // printf($enrolls);
        // printf($id);
        if ($studentId === null && $school_year === null && $semester === null) {

            $enrolls = Enroll::all();
        }
            $students = Student::all();
            $sections = Section::all();
        return view('enrolls.index', compact('enrolls','students','sections','studentId','school_year', 'semester','id'));
    }

    public function create()
    {
        // Add logic to fetch necessary data (e.g., sections, students) if needed
        $sections = Section::all();
        $courses = Course::all();
        $students = Student::all();
        return view('enrolls.create', compact('sections', 'courses','students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'student_id' => 'required',
            'validated' => 'boolean',
        ]);

        Enroll::create([
            'section_id' => $request->input('section_id'),
            'student_id' => $request->input('student_id'),
            'validated' => $request->input('validated'),
        ]);

         // Update the Section slots and enrollee columns
         $this->updateSection($request->input('section_id'));

        return redirect()->route('enrolls.index')->with('success', 'Enroll created successfully!');
    }


    // New method to update Section slots and enrollee
    private function updateSection($sectionId)
    {
        // Find the Section
        $section = Section::findOrFail($sectionId);

        // Check if there are available slots before updating
        if ($section->slots > 0) {
            // Update the Section slots and enrollee columns
            $section->update([
                'slots' => $section->slots - 1,
                'enrollee' => $section->enrollee + 1,
            ]);
        }
    }


    public function show(Enroll $enroll)
    {
        return view('enrolls.show', compact('enroll'));
    }

    public function edit(Enroll $enroll)
    {
        // Add logic to fetch necessary data (e.g., sections, students) if needed
        return view('enrolls.edit', compact('enroll'));
    }

    public function update(Request $request, Enroll $enroll)
    {
        $request->validate([
            'section_id' => 'required',
            'student_id' => 'required',
            'validated' => 'boolean',
        ]);

        $enroll->update($request->all());

        return redirect()->route('enrolls.index')->with('success', 'Enroll updated successfully!');
    }

    public function destroy(Enroll $enroll)
    {
        $enroll->delete();

        return redirect()->route('enrolls.index')->with('success', 'Enroll deleted successfully!');
    }
}
