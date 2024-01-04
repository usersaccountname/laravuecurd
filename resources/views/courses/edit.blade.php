<!-- resources/views/courses/edit.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Course</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="course_code" class="form-label">Course Code</label>
                        <input type="text" name="course_code" id="course_code" class="form-control" value="{{ $course->course_code}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="course_desc" class="form-label">Course Description</label>
                        <input type="text" name="course_desc" id="course_desc" class="form-control" value="{{ $course->course_desc }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Course Fee</label>
                        <input type="n" name="price" id="price" class="form-control" value="{{ $course->price }}"  required>
                    </div>
                    <!-- Add more fields as needed -->
                    <button type="submit" class="btn btn-primary">Update Course</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
