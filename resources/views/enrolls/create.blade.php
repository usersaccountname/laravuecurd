<!-- resources/views/enrolls/create.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Add Enroll</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('enrolls.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="section_id" class="form-label">Select Section:</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <!-- Add options dynamically based on your data -->
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_code }} -
                                    @foreach($courses as $course)
                                        @if($section->course_id == $course->id)
                                            {{ $course->course_code }} ({{ $course->course_desc }})
                                        @endif
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="student_id" class="form-label">Student:</label>
                        <!-- <input type="text" name="student_id" id="student_id" class="form-control" required> -->
                        <select name="student_id" id="student_id" class="form-select">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->student_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="validated" class="form-label">Validation:</label>
                        <select name="validated" id="validated" class="form-select" required>
                            <option value="0" selected>Unvalidated</option>
                            <option value="1">Validated</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Add Enroll</button>
                </form>
            </div>
        </div>
    </div>
@endsection
