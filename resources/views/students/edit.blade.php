@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Update Student Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('students/' . $students->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PATCH')

                <!-- Hidden Input -->
                <input type="hidden" name="id" id="id" value="{{ $students->id }}">

                <!-- Name Input -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ $students->name }}" 
                        class="form-control shadow-sm" 
                        required>
                    <div class="invalid-feedback">
                        Please enter the student's name.
                    </div>
                </div>

                <!-- Address Input -->
                <div class="form-group mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address" 
                        value="{{ $students->address }}" 
                        class="form-control shadow-sm" 
                        required>
                    <div class="invalid-feedback">
                        Please enter the student's address.
                    </div>
                </div>

                <!-- Mobile Input -->
                <div class="form-group mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input 
                        type="text" 
                        name="mobile" 
                        id="mobile" 
                        value="{{ $students->mobile }}" 
                        class="form-control shadow-sm" 
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid mobile number.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success shadow">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center bg-light">
            <small class="text-muted">Student Management System &copy; {{ date('Y') }}</small>
        </div>
    </div>
</div>

<!-- Custom Script for Bootstrap Validation -->
<script>
    // Enable Bootstrap Validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
