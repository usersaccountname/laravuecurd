@extends('layouts.minion')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Create Director</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('directors.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>


                        <!-- Add more fields as needed -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-2">Create Director</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
