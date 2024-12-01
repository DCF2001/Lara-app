@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Update Student Details</h3>
        </div>
        <div class="card-body">
            <!-- Success or Error Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

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
                        type="tel" 
                        name="mobile" 
                        id="mobile" 
                        value="{{ $students->mobile }}" 
                        class="form-control shadow-sm" 
                        pattern="^\d{10}$" 
                        maxlength="10" 
                        minlength="10" 
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid 10-digit mobile number.
                    </div>
                </div>

                <!-- Teacher Selection -->
                <div class="form-group mb-4">
                    <label for="teacher_id" class="form-label">Assign Teacher</label>
                    <select 
                        name="teacher_id" 
                        id="teacher_id" 
                        class="form-control shadow-sm" 
                        required>
                        <option value="" disabled selected>Select a Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $students->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a teacher.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success shadow" id="submit-button">
                        <span id="submit-text">
                            <i class="fa fa-save"></i> Update
                        </span>
                        <span id="submit-loading" class="d-none">
                            <i class="fa fa-spinner fa-spin"></i> Updating...
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center bg-light">
            <small class="text-muted">Student Management System &copy; {{ date('Y') }}</small>
        </div>
    </div>
</div>

<!-- Custom Script for Bootstrap Validation and Button Loading -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // Disable button and show loading
                        const submitButton = document.getElementById('submit-button');
                        const submitText = document.getElementById('submit-text');
                        const submitLoading = document.getElementById('submit-loading');
                        submitText.classList.add('d-none');
                        submitLoading.classList.remove('d-none');
                        submitButton.disabled = true;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
