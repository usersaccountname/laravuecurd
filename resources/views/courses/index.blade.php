<!-- resources/views/courses/index.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Courses</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.index') }}" method="GET" class="mb-3 col-7 float-end mt-2">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Course Code or Description" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm float-start mt-3 mb-4">Add Course</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Fee Price</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th class="px-5"><text class="float-end mx-5">Actions</text></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->course_desc }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->created_at }}</td>
                                <td>{{ $course->updated_at }}</td>
                                <!-- Add more columns as needed -->
                                <td class="px-5">
                                    <!-- Add buttons for actions (e.g., edit, delete) -->
                                    <a href="{{ route('courses.show', ['course' => $course->id]) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                    </form>
                                    <!-- Add delete button form if needed -->
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
