<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Teach;
use App\Models\Section;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class TeachController extends Controller
{
    public function index(Request $request)
    {
        $instructorId = $request->input('instructor_id');
        $instructors = DB::table('instructors')
                ->where('instructor_id',$instructorId)
                ->get();
        if($instructorId != ''){
            $result = $instructors[0]->id;
        }
        // printf($instructors);
        // printf($result);

        $school_year = $request->input('school_year');
        $semester = $request->input('semester');

        $teaches = DB::table('teaches')
        ->join('sections', 'sections.id', '=', 'teaches.section_id')
        ->where('sections.school_year', $school_year)
        ->where('sections.semester', $semester)
        ->get();
        // printf($teaches[0]->section_code);
        if ($instructorId === null && $school_year === null && $semester === null) {
            $teaches = Teach::all();
        }
        $instructors = Instructor::all();
        $sections = Section::all();
        return view('teaches.index', compact('teaches','instructors','sections','instructorId','school_year', 'semester'));
    }

    public function create()
    {
        $sections = Section::all();
        $courses = Course::all();
        $instructors = Instructor::all();

        return view('teaches.create', compact('sections', 'courses','instructors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'instructor_id' => 'required',
            'validated' => 'boolean',
        ]);

        Teach::create([
            'section_id' => $request->input('section_id'),
            'instructor_id' => $request->input('instructor_id'),
            'validated' => $request->input('validated'),
        ]);

        return redirect()->route('teaches.index')->with('success', 'Teach record created successfully!');
    }

    public function show(Teach $teach)
    {
        return view('teaches.show', compact('teach'));
    }

    public function edit(Teach $teach)
    {
        $sections = Section::all();
        $courses = Course::all();
        $instructors = Instructor::all();

        return view('teaches.edit', compact('teach', 'sections','courses' ,'instructors'));
    }

    public function update(Request $request, Teach $teach)
    {
        $request->validate([
            'section_id' => 'required',
            'instructor_id' => 'required',
            'validated' => 'boolean',
        ]);

        $teach->update($request->all());

        return redirect()->route('teaches.index')->with('success', 'Teach record updated successfully!');
    }

    public function destroy(Teach $teach)
    {
        $teach->delete();

        return redirect()->route('teaches.index')->with('success', 'Teach record deleted successfully!');
    }
}
