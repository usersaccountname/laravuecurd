<!-- resources/views/dashboard/director.blade.php -->

@extends('layouts.minion') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div class="container">
        <h1 class="mt-5">Welcome to the Director Dashboard, {{ ucfirst(auth()->user()->first_name) }}!</h1>

        <!-- Add your dashboard content here -->

        <div class="mt-4">
            <!-- Example: Display some director-specific information -->
            <p>Your Director-specific content goes here.</p>
        </div>

        <form id="logout-form" action="{{ route('dlogout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
