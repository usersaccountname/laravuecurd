<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search1 = $request->input('search1');

        $students = Student::when($search1, function ($query) use ($search1) {
            $query->where(strtolower('student_id'), 'like', '%' . strtoLower($search1) . '%')
                ->orWhere(strtolower('first_name'), 'like', '%' . strtolower($search1) . '%')
                ->orWhere(strtolower('last_name'), 'like', '%' . strtolower($search1) . '%');
        })->get();

        // $students = Instructor::all();
        return view('students.index', compact('students', 'search1'));
    }


    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Store the instructor in the database
        Student::create([
            'student_id' => 'I-' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')),
            'email' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')). '@example.com',
            'phone_number' => '',
            // Add other fields
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validation logic here
        $request->validate([
            // Add your validation rules
        ]);

        // Update the instructor in the database
        $student->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')). '@example.com',
            'phone_number' => $request->input('last_name'),
            // Add other fields
        ]);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

}
