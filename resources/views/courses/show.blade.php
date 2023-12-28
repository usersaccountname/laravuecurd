<!-- courses.show.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Course Details</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $course->id }}</td>
                    </tr>
                    <tr>
                        <th>Course Code</th>
                        <td>{{ $course->course_code }}</td>
                    </tr>
                    <tr>
                        <th>Course Description</th>
                        <td>{{ $course->course_desc }}</td>
                    </tr>
                    <tr>
                        <th>Fee Price</th>
                        <td>{{ $course->price }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $course->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $course->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
