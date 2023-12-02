@extends('layouts.clinic')

@section('content')
    <div class="container mt-4">
        <h1>Edit Patient</h1>

        <form action="{{ route('patients.update', ['patient' => $patient->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient ID</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ $patient->patient_id }}" required>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $patient->first_name }}">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $patient->last_name }}">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $patient->age }}">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ $patient->gender }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Patient</button>
        </form>
    </div>
@endsection
