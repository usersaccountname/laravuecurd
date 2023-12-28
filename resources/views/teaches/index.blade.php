<!-- resources/views/teaches/index.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Teaches</h2>
                <!-- You can add filters here if needed -->
            </div>
            <div class="card-body">
                <form action="{{ route('teaches.index') }}" method="GET" class="float-end" id="filterForm">
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
                                <option value="2" {{ request('semester', 2) == 2 ? 'selected' : '' }}>2nd Semester</option>
                                <option value="3" {{ request('semester', 3) == 3 ? 'selected' : '' }}>Summer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="instructor_id" class="form-label">Instructor ID:</label>
                            <input type="text" name="instructor_id" id="instructor_id" class="form-control" placeholder="Enter Instructor ID" value="{{ request('instructorId') }}">
                        </div>
                        <div class="col-md-6 px-3 mt-3">
                            <button class="btn btn-outline-secondary float-start" type="submit">Search Filter</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('teaches.create') }}" class="btn btn-primary btn-sm float-start mb-3">Add Teach Record</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Section ID</th>
                            <th>Instructor ID</th>
                            <th>Validated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teaches as $teach)
                            <tr>
                                <td>{{ $teach->id }}</td>
                                <td>
                                    @foreach($sections as $section)
                                        @if($teach->section_id == $section->id)
                                            {{ $section->section_code }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($instructors as $instructor)
                                        @if($instructor->id == $teach->instructor_id)
                                            {{ $instructor->id}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $teach->validated ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('teaches.show', $teach->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('teaches.edit', $teach->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('teaches.destroy', $teach->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this teach record?')">Delete</button>
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
