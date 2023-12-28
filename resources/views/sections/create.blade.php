@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Add Section</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-3 col-lg-3">
                            <label for="section_code" class="form-label">Section Code:</label>
                            <input type="text" name="section_code" id="section_code" class="form-control" required>
                        </div>

                        <div class="mb-3 col-lg-5 col-md-5">
                            <label for="course_id" class="form-label">Course:</label>
                            <select name="course_id" id="course_id" class="form-select" required>
                                <!-- Populate options dynamically from the Course table -->
                                <option placeholder="Select Option" value='' selected disabled>Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_code }}  {{ $course->course_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-md-4">
                            <label for="instructor_id" class="form-label">Instructor:</label>
                            <select name="instructor_id" id="instructor_id" class="form-select" required>
                                <!-- Populate options dynamically from the Course table -->
                                <option placeholder="Select Option" value='' selected disabled>Select Instructor</option>
                                @foreach($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->first_name }}  {{ $instructor->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3 col-lg-4 col-md-4">
                            <label for="time_code" class="form-label">Time Code</label>
                            <div class="input-group">
                                <input type="time" name="start_time" class="form-control" required>
                                <span class="input-group-text">to</span>
                                <input type="time" name="end_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 col-md-2 col-lg-2">
                            <label for="day" class="form-label">Day</label>
                            <select name="day" class="form-select" required>
                                <option value="" disabled selected>Select Day</option>
                                <option value="Mth">Monday/Thursday</option>
                                <option value="TF">Tuesday/Friday</option>
                                <option value="W">Wednesday</option>
                                <option value="S">Saturday</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-3 col-md-3">
                            <label for="school_year" class="form-label">School Year:</label>
                            <select name="school_year" id="school_year" class="form-select" required>
                                @for ($year = date('Y') + 1; $year >= 2015; $year--)
                                    <option value="{{ $year - 1 }} - {{ $year }}">{{ $year - 1 }} - {{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3 col-lg-3">
                            <label for="semester" class="form-label">Semester:</label>
                            <select name="semester" id="semester" class="form-select" required>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                                <option value="3">Summer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-3 col-lg-6">
                            <label for="bldg" class="form-label">Building:</label>
                            <input type="text" name="bldg" id="bldg" class="form-control">
                        </div>

                        <div class="mb-3 col-md-3 col-lg-3">
                            <label for="room" class="form-label">Room:</label>
                            <input type="text" name="room" id="room" class="form-control">
                        </div>
                        <div class="mb-3 col-md-3 col-lg-3">
                            <label for="units" class="form-label">Units</label>
                            <input type="number" name="units" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-md-2">
                            <label for="slots" class="form-label">Slots:</label>
                            <input type="number" name="slots" id="slots" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-2">
                            <label for="enrollee" class="form-label">Enrollee:</label>
                            <input type="number" name="enrollee" id="enrollee" class="form-control" value="0" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="offering" class="form-label">Offering</label>
                            <select name="offering" class="form-select" required>
                                <option value="1">Regular</option>
                                <option value="0">Requested</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="restriction" class="form-label">Restriction:</label>
                            <select name="restriction" id="restriction" class="form-select" required>
                                <option value="0">OPEN</option>
                                <option value="1">RESTRICTED</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-primary">Add Section</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
