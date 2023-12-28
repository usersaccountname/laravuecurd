<!-- resources/views/enrolls/index.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Enrolls</h2>
                <!-- <div class="row">
                    <div class="col-4"> {{ request('student_id') }}</div>
                    <div class="col-4"> {{ request('school_year') }}</div>
                    <div class="col-4">{{ request('semester') }}</div>
                </div> -->



            </div>
            <div class="card-body">
                <form action="{{ route('enrolls.index') }}" method="GET" class="float-end" id="filterForm">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="school_year" class="form-label">Select School Year:</label>
                            <select name="school_year" id="school_year" class="form-select" required>
                                @for ($year = date('Y') + 1; $year >= 2015; $year--)
                                    <option value="{{ $year - 1 }} - {{ $year }}">{{ $year - 1 }} - {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="semester" class="form-label">Select Semester:</label>
                            <select name="semester" id="semester" class="form-select">
                                <option value="1" {{ request('semester', 1) == 1 ? 'selected' : '' }}>1st Semester</option>
                                <option value="2" {{ request('semester', 2) == 2 ? '' : '' }}>2nd Semester</option>
                                <option value="3" {{ request('semester', 3) == 3 ? '' : '' }}>Summer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="student_id" class="form-label">Student ID:</label>
                            <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID" value="{{ request('id') }}">
                        </div>
                        <div class="col-md-6 px-3 mt-3">
                            <button class="btn btn-outline-secondary float-start" type="submit">Search Filter</button>
                        </div>
                    </div>
                </form>





                <a href="{{ route('enrolls.create') }}" class="btn btn-primary btn-sm float-start mb-3">Add Enroll</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Section ID</th>
                            <th>Student ID</th>
                            <th>Building & Room</th>
                            <th>Validated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <td>{{ $enroll->id }}</td>
                                <td>
                                    @foreach($sections as $section)
                                        @if($enroll->section_id == $section->id)
                                            {{ $section->section_code }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($students as $student)
                                        @if($enroll->student_id == $student->id)
                                            {{ $student->student_id }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($sections as $section)
                                        @if($enroll->section_id == $section->id)
                                            {{ $section->bldg }} - {{ $section->room }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $enroll->validated ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('enrolls.show', $enroll->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('enrolls.edit', $enroll->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('enrolls.destroy', $enroll->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this enroll?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
