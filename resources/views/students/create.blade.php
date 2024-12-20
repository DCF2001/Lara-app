@extends('layout')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Add New Student</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('students') }}" method="post" class="p-4">
                {!! csrf_field() !!}

                <!-- Name Input -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter student name" required>
                </div>

                <!-- Address Input -->
                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter student address" required>
                </div>

                <!-- Mobile Input -->
                <div class="form-group mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile number" required>
                </div>

                <!-- Select Teacher -->
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher</label>
                    <select name="teacher_id" id="teacher_id" class="form-control" required>
                        <option value="" disabled selected>Select a teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }} - {{ $teacher->subject }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/students') }}" class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
