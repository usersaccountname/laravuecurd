<!-- resources/views/teaches/edit.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Teach Record</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('teaches.update', $teach->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="section_id" class="form-label">Select Section:</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <!-- Add options dynamically based on your data, selected the current section_id -->
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}" {{ $teach->section_id == $section->id ? 'selected' : '' }}>
                                    {{ $section->section_code }} -
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
                        <label for="instructor_id" class="form-label">Select Instructor:</label>
                        <select name="instructor_id" id="instructor_id" class="form-select">
                            <!-- Add options dynamically based on your data, selected the current instructor_id -->
                            @foreach($instructors as $instructor)
                                <option value="{{ $instructor->id }}" {{ $teach->instructor_id == $instructor->id ? 'selected' : '' }}>
                                    {{ $instructor->instructor_id }}
                                </option>
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


                    <button type="submit" class="btn btn-primary">Update Teach Record</button>
                </form>
            </div>
        </div>
    </div>
@endsection
