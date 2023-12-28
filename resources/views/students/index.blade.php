@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Students</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('students.index') }}" method="GET" class="mb-3 col-lg-4 float-end mt-2">
                    <div class="row px-5">
                        <div class="col-lg-8 mt-0">
                            <label for="search" class="form-label">Search Student:</label>
                            <input type="text" name="search" id="search" class="form-control mt-0" placeholder="Search by Name or ID" value="{{ request('search') }}">
                        </div>
                        <div class="col-lg-4 mt-2">
                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-start mt-3 mb-4">Add Student</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <!-- Add more columns as needed -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->created_at }}</td>
                                <td>{{ $student->updated_at }}</td>
                                <!-- Add more columns as needed -->
                                <td>
                                    <!-- Add buttons for actions (e.g., edit, delete) -->
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                    </form>
                                    <!-- Add delete button if needed -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
