<!-- directors.show.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Director Details</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Director ID</th>
                        <td>{{ $director->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }}</td>
                    </tr>
                    <!-- <tr>
                        <th>Email</th>
                        <td>{{ $director->email }}</td>
                    </tr> -->
                    <tr>
                        <th>Created At</th>
                        <td>{{ $director->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $director->updated_at }}</td>
                    </tr>
                    <!-- Add more details as needed -->
                </table>
                <a href="{{ route('directors.index') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
            </div>
        </div>
    </div>
@endsection
