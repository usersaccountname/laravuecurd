<!-- resources/views/enrolls/edit.blade.php -->

@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Enroll</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('enrolls.update', $enroll->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="section_id" class="form-label">Select Section:</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <!-- Add options dynamically based on your data, selected the current section_id -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="student_id" class="form-label">Select Student:</label>
                        <select name="student_id" id="student_id" class="form-select">
                            <!-- Add options dynamically based on your data, selected the current student_id -->
                        </select>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="validated" class="form-check-input" id="validated" {{ $enroll->validated ? 'checked' : '' }}>
                        <label class="form-check-label" for="validated">Validated</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Enroll</button>
                </form>
            </div>
        </div>
    </div>
@endsection
