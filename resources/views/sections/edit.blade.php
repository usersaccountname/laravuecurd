@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Section</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.update', $section->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>Course:</th>
                                    <td>
                                    <input type="text" name="course_id" class="form-control" value="{{ $section->course_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Instructor:</th>
                                    <td>
                                        <select name="course_id" id="course_id" class="form-select" required>
                                            <!-- Populate options dynamically from the Course table -->
                                            <option placeholder="Select Option" value='' selected disabled>Section Instructor</option>
                                            @foreach($instructors as $instructor)
                                                <option value="{{ $instructor->id }}">{{ $instructor->first_name }}  {{ $instructor->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>School Year:</th>
                                    <td>
                                    <input type="text" name="school_year" class="form-control" value="{{ $section->school_year }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>Semester:</th>
                                    <td>
                                    <input type="text" name="semester" class="form-control" value="{{ $section->semester }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Building:</th>
                                    <td><input type="text" name="bldg" class="form-control" value="{{ $section->bldg }}"></td>
                                </tr>
                                <tr>
                                    <th>Room:</th>
                                    <td><input type="text" name="room" class="form-control" value="{{ $section->room }}"></td>
                                </tr>
                                <tr>
                                    <th>Slots:</th>
                                    <td><input type="number" name="slots" class="form-control" value="{{ $section->slots }}" required></td>
                                </tr>
                                <tr>
                                    <th>Enrollee:</th>
                                    <td><input type="number" name="enrollee" class="form-control" value="{{ $section->enrollee }}" required></td>
                                </tr>
                                <tr>
                                    <th>Offering:</th>
                                    <td><input type="text" name="offering" class="form-control" value="{{ $section->offering }}" required></td>
                                </tr>
                                <tr>
                                    <th>Offered Courses:</th>
                                    <td>
                                        <input type="text" name="course" class="form-control" value="{{ $section->course }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Restriction:</th>
                                    <td>
                                        <input type="text" name="restriction" class="form-control" value="{{ $section->restriction }}">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>Start Time:</th>
                                    <td>
                                        <label for="time_code" class="form-label">Time Code</label>
                                        <div class="input-group">
                                            <input type="time" name="start_time" class="form-control" value="{{ $section->start_time}}" required>
                                            <span class="input-group-text">to</span>
                                            <input type="time" name="end_time" class="form-control" value="{{ $section->start_time}}"  required>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Section</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
