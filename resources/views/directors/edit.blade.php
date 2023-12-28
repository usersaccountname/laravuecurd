<!-- directors.edit.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Director</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('directors.update', $director->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ ucfirst(auth()->user()->first_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ ucfirst(auth()->user()->last_name) }}" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $director->email }}" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" name="password" id="password" class="form-control" value="{{ $director->password }}" >
                    </div>
                    <!-- Add more fields as needed -->
                    <button type="submit" class="btn btn-primary">Update Director</button>
                    <a href="{{ route('directors.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
