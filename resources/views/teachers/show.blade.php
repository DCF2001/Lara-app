@extends('layout')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Teacher Details</h3>
        </div>
        <div class="card-body">
            <!-- Teacher Information -->
            <div class="text-center">
                <h4 class="card-title text-primary">Name: <span class="text-dark">{{ $teacher->name }}</span></h4>
            </div>
            <hr class="my-4">

            <div class="row">
                <!-- Address Section -->
                <div class="col-md-4 text-center">
                    <div class="p-3 border rounded bg-light">
                        <h5 class="text-muted">Address</h5>
                        <p class="text-dark">{{ $teacher->address }}</p>
                    </div>
                </div>

                <!-- Mobile Section -->
                <div class="col-md-4 text-center">
                    <div class="p-3 border rounded bg-light">
                        <h5 class="text-muted">Mobile</h5>
                        <p class="text-dark">{{ $teacher->mobile }}</p>
                    </div>
                </div>

                <!-- Subject Section -->
                <div class="col-md-4 text-center">
                    <div class="p-3 border rounded bg-light">
                        <h5 class="text-muted">Subject</h5>
                        <p class="text-dark">{{ $teacher->subject }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-center bg-light">
            <a href="{{ url('/teachers') }}" class="btn btn-outline-primary">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
            <a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" class="btn btn-outline-warning">
                <i class="fa fa-pencil-alt"></i> Edit
            </a>
            <form action="{{ url('/teachers/' . $teacher->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this teacher?');">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
