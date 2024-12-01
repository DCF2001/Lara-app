@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Update Teacher Details</h3>
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

            <form action="{{ url('teachers/' . $teacher->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PATCH')

                <!-- Hidden Input -->
                <input type="hidden" name="id" id="id" value="{{ $teacher->id }}">

                <!-- Name Input -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ $teacher->name }}" 
                        class="form-control shadow-sm" 
                        required>
                    <div class="invalid-feedback">
                        Please enter the teacher's name.
                    </div>
                </div>

                <!-- Address Input -->
                <div class="form-group mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address" 
                        value="{{ $teacher->address }}" 
                        class="form-control shadow-sm" 
                        required>
                    <div class="invalid-feedback">
                        Please enter the teacher's address.
                    </div>
                </div>

                <!-- Mobile Input -->
                <div class="form-group mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input 
                        type="tel" 
                        name="mobile" 
                        id="mobile" 
                        value="{{ $teacher->mobile }}" 
                        class="form-control shadow-sm" 
                        pattern="^\d{10}$" 
                        maxlength="10" 
                        minlength="10" 
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid 10-digit mobile number.
                    </div>
                </div>
                            <!-- Subject Input -->
        <div class="form-group mb-4">
            <label for="subject" class="form-label">Subject</label>
                <input 
                          type="text" 
                          name="subject" 
                          id="subject" 
                          value="{{ $teacher->subject }}" 
                          class="form-control shadow-sm" 
                          required>
                    <div class="invalid-feedback">
                Please enter the subject taught by the teacher.
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
            <small class="text-muted">Teacher Management System &copy; {{ date('Y') }}</small>
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
