<!-- instructors.show.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Instructor Details</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Instructor ID</th>
                        <td>{{ $instructor->instructor_id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $instructor->first_name }} {{ $instructor->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $instructor->email }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $instructor->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $instructor->updated_at }}</td>
                    </tr>
                    <!-- Add more details as needed -->

                </table>
                <a href="{{ route('instructors.index') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
            </div>
        </div>
    </div>
@endsection
