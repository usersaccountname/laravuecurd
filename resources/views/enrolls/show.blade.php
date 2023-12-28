<!-- resources/views/enrolls/show.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Enroll Details</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $enroll->id }}</td>
                    </tr>
                    <tr>
                        <th>Section ID</th>
                        <td>{{ $enroll->section_id }}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>{{ $enroll->student_id }}</td>
                    </tr>
                    <tr>
                        <th>Validated</th>
                        <td>{{ $enroll->validated ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $enroll->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $enroll->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
