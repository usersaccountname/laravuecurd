@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Student Details</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $student->id }}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>{{ $student->student_id }}</td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td>{{ $student->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $student->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $student->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $student->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
