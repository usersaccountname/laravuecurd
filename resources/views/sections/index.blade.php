@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Sections</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.index') }}" method="GET" class="mb-3 col-lg-4 float-end mt-2">
                    <div class="row px-5">
                        <div class="col-lg-8 mt-0">
                            <label for="search" class="form-label">Search Section:</label>
                            <input type="text" name="search" id="search" class="form-control mt-0" placeholder="Search by Section Code, Course ID, School Year, or Semester" value="{{ request('search') }}">
                        </div>
                        <div class="col-lg-4 mt-2">
                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('sections.create') }}" class="btn btn-primary btn-sm float-start mt-3 mb-4">Add Section</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Section Code</th>
                            <th>Course ID</th>
                            <th>Instructor ID</th>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Building</th>
                            <th>Room</th>
                            <th>Slots</th>
                            <th>Enrollee</th>
                            <th>Offering</th>
                            <th>Restriction</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->section_code }}</td>
                                <td>{{ $section->course_id }}</td>
                                <td>
                                    @foreach($instructors as $instructor)
                                        @if($instructor->id == $section->instructor_id)
                                            {{ $instructor->instructor_id }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $section->school_year }}</td>
                                <td>{{ $section->semester }}</td>
                                <td>{{ $section->bldg }}</td>
                                <td>{{ $section->room }}</td>
                                <td>{{ $section->slots }}</td>
                                <td>{{ $section->enrollee }}</td>
                                <td>{{ $section->offering }}</td>
                                <td>{{ $section->restriction ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('sections.show', $section->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('sections.edit', ['section' => $section->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
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
