<template>

    <!-- <div class="container py-4"> -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Students</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View student information and schedules.</p>
                        <a href=" {{ route('students.index') }}" class="btn btn-primary">Go to Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Instructors</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View instructor information and schedules.</p>
                        <a href="{{ route('instructors.index') }}" class="btn btn-primary">Go to Instructors</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</template>
