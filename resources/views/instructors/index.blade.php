    @extends('layouts.minion')

    @section('content')
        <div class="container py-4">
            <div class="card">
                <div class="card-header">
                    <h2>Instructors</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('instructors.index') }}" method="GET" class="mb-3 col-lg-4 float-end mt-2">
                        <div class="row px-5">
                            <div class="col-lg-8 mt-0">
                                <label for="search1" class="form-label">Search Instructor:</label>
                                <input type="text" name="search1" id="search1" class="form-control mt-0" placeholder="Search by Name or ID" value="{{ request('search1') }}">
                            </div>
                            <div class="col-lg-4 mt-2">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('instructors.create') }}" class="btn btn-primary btn-sm float-start mt-3 mb-4">Add Instructor</a>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>Instructor ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <!-- Add more columns as needed -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($instructors as $instructor)
                                <tr>
                                    <td>{{ $instructor->instructor_id }}</td>
                                    <td>{{ $instructor->first_name }} {{ $instructor->last_name }}</td>
                                    <td>{{ $instructor->email }}</td>
                                    <td>{{ $instructor->created_at }}</td>
                                    <td>{{ $instructor->updated_at }}</td>
                                    <!-- Add more columns as needed -->
                                    <td>
                                        <!-- Add buttons for actions (e.g., edit, delete) -->
                                        <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-success btn-sm">Show</a>
                                        <a href="{{ route('instructors.edit', ['instructor' => $instructor->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this instructor?')">Delete</button>
                                        </form>

                                        <!-- Add delete button if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
