<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $search1 = $request->input('search1');

        $instructors = Instructor::when($search1, function ($query) use ($search1) {
            $query->where(strtolower('instructor_id'), 'like', '%' . strtoLower($search1) . '%')
                ->orWhere(strtolower('first_name'), 'like', '%' . strtolower($search1) . '%')
                ->orWhere(strtolower('last_name'), 'like', '%' . strtolower($search1) . '%');
        })->get();

        // $instructors = Instructor::all();
        return view('instructors.index', compact('instructors', 'search1'));
    }


    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Store the instructor in the database
        Instructor::create([
            'instructor_id' => 'I-' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')),
            'email' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')). '@example.com',
            'phone_number' => '',
            // Add other fields
        ]);

        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully!');
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        // Validation logic here
        $request->validate([
            // Add your validation rules
        ]);

        // Update the instructor in the database
        $instructor->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')). '@example.com',
            'phone_number' => $request->input('last_name'),
            // Add other fields
        ]);
        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully!');
    }

    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
