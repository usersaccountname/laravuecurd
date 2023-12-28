@extends('layouts.stud')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Schedules</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('learners.index') }}" method="GET" class="float-end" id="filterForm">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="school_year" class="form-label">Select School Year:</label>
                            <select name="school_year" id="school_year" class="form-select">
                                @for ($year = date('Y') + 1; $year >= 2015; $year--)
                                    <option value="{{ $year - 1 }} - {{ $year }}" {{ request('school_year', '2023 - 2024') == ($year - 1) . ' - ' . $year ? 'selected' : '' }}>
                                        {{ $year - 1 }} - {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="semester" class="form-label">Select Semester:</label>
                            <select name="semester" id="semester" class="form-select">
                                <option value="1" {{ request('semester', 1) == 1 ? 'selected' : '' }}>1st Semester</option>
                                <option value="2">2nd Semester</option>
                                <option value="3">Summer</option>
                            </select>
                        </div>
                        <div class="col-md-6 px-3 mt-3">
                            <button class="btn btn-outline-secondary float-start" type="submit">Search Filter</button>
                        </div>
                    </div>

                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Section Code</th>
                            <th>Schedule</th>
                            <th>Day</th>
                            <th>Units</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>
                                    @foreach ($courses as $course)
                                        @if ($course->id == $section->course_id)
                                        {{ $course->course_code  }} - {{ $course->course_desc }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $section->section_code }}</td>
                                <td>{{ $section->start_time }} - {{ $section->end_time }}</td>
                                <td>{{ $section->day }}</td>
                                <td>{{ $section->units }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
