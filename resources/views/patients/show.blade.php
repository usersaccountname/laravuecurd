@extends('layouts.clinic')

@section('content')
    <div class="container mt-4">
        <h1>Patient Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Patient ID: {{ $patient->patient_id }}</h5>
                <p class="card-text"><strong>First Name:</strong> {{ $patient->first_name }}</p>
                <p class="card-text"><strong>Last Name:</strong> {{ $patient->last_name }}</p>
                <p class="card-text"><strong>Age:</strong> {{ $patient->age }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ $patient->gender }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('patients.edit', ['patient' => $patient->id]) }}" class="btn btn-primary">Edit Patient</a>
            <form action="{{ route('patients.destroy', ['patient' => $patient->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete Patient</button>
            </form>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
        </div>
    </div>
@endsection
