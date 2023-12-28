<!-- resources/views/dashboard/instructor.blade.php -->

@extends('layouts.instruct') <!-- Assuming you have an 'instructors' layout, adjust as needed -->

@section('content')
    <div class="container">
        <h1 class="mt-5">Welcome to the Instructor Dashboard, {{ ucfirst(auth()->user()->first_name) }}!</h1>

        <!-- Add your dashboard content here -->
        <form id="logout-form" action="{{ route('ilogout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
