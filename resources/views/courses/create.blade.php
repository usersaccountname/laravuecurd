<!-- resources/views/courses/create.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Add Course</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="course_code" class="form-label">Course Code</label>
                        <input type="text" name="course_code" id="course_code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="course_desc" class="form-label">Course Description</label>
                        <input type="text" name="course_desc" id="course_desc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Course Fee</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <!-- Add more fields as needed -->
                    <button type="submit" class="btn btn-primary">Add Course</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
