@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Directors</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('directors.index') }}" method="GET" class="mb-3 col-lg-4 float-end mt-2">
                    <div class="row px-5">
                        <div class="col-lg-8 mt-0">
                            <label for="search1" class="form-label">Search Director:</label>
                            <input type="text" name="search1" id="search1" class="form-control mt-0" placeholder="Search by Name or ID" value="{{ request('search1') }}">
                        </div>
                        <div class="col-lg-4 mt-2">
                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('directors.create') }}" class="btn btn-primary btn-sm float-start mt-3 mb-4">Add Director</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Director ID</th>
                            <th>Name</th>
                            <!-- <th>Email</th> -->
                            <th>Created at</th>
                            <th>Updated at</th>
                            <!-- Add more columns as needed -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($directors as $director)
                            <tr>
                                <td>{{ $director->id }}</td>
                                <td>{{ ucfirst($director->first_name) }} {{ ucfirst($director->last_name) }}</td>
                                <!-- <td>{{ $director->email }}</td> -->
                                <td>{{ $director->created_at }}</td>
                                <td>{{ $director->updated_at }}</td>
                                <!-- Add more columns as needed -->
                                <td>
                                    <!-- Add buttons for actions (e.g., edit, delete) -->
                                    <a href="{{ route('directors.show', $director->id) }}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{ route('directors.edit', ['director' => $director->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('directors.destroy', $director->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this director?')">Delete</button>
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
