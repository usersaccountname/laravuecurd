<!-- resources/views/dashboard/student.blade.php -->

@extends('layouts.stud') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div class="container">
        <h1 class="mt-5">Welcome to the Student Dashboard, {{ ucfirst(auth()->user()->first_name) }}!</h1>

        <!-- Add your dashboard content here -->
        <form id="logout-form" action="{{ route('slogout') }}" method="POST" style="display: none;">
            @csrf

        </form>
    </div>
@endsection
