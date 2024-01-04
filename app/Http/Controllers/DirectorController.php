<?php

namespace App\Http\Controllers;


use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    public function create()
    {
        return view('directors.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Store the instructor in the database
        Director::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')),
            'email' => strtolower($request->input('first_name')).'.'.strtolower($request->input('last_name')). '@example.com',
            'phone_number' => '',
            // Add other fields
        ]);

        return redirect()->route('directors.index')->with('success', 'Director created successfully!');
    }

    public function show($id)
    {
        $director = Director::find($id);
        return view('directors.show', compact('director'));
    }

    public function edit($id)
    {
        $director = Director::find($id);
        return view('directors.edit', compact('director'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the director data
    }

    public function destroy($id)
    {
        // Delete the director
    }
    // public function index()
    // {
    //     // Add logic for the director dashboard
    //     return view('directors.dashboard');
    // }
    public function showLoginForm(Request $request)
    {
        $username = $request->input('username');
        return view('auth.dlogin', compact('username'));
    }

    public function dlogin(Request $request)
    {
        // Validate the login request
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // if( $request->input('username') == 'chris.angel'){

        //     // Authentication passed
        //     if ( $request->input('password') == 'MainUser'){
        //         return redirect()->intended('/directr_dashboard');
        //     }
        // }else{
        //     // Authentication failed
        //     return back()->withErrors(['username' => 'Invalid credentials']);
        // }

        $credentials = $request->only('username', 'password');

        if (Auth::guard('directors')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/admindash');
        } else {
            // Authentication failed
            return back()->withErrors(['username' => 'Invalid credentials']);
        }

    }

    public function dlogout()
    {
        Auth::guard('directors')->logout();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
