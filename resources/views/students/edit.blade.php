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
                        value="{{ old('name', $students->name) }}" 
                        class="form-control shadow-sm @error('name') is-invalid @enderror" 
                        required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please enter the student's name.</div>
                    @enderror
                </div>

                <!-- Address Input -->
                <div class="form-group mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address" 
                        value="{{ old('address', $students->address) }}" 
                        class="form-control shadow-sm @error('address') is-invalid @enderror" 
                        required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please enter the student's address.</div>
                    @enderror
                </div>

                <!-- Mobile Input -->
                <div class="form-group mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input 
                        type="text" 
                        name="mobile" 
                        id="mobile" 
                        value="{{ old('mobile', $students->mobile) }}" 
                        class="form-control shadow-sm @error('mobile') is-invalid @enderror" 
                        required>
                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please enter a valid mobile number.</div>
                    @enderror
                </div>

                <!-- Teacher Dropdown -->
                <div class="form-group mb-4">
                    <label for="teacher_id" class="form-label">Assigned Teacher</label>
                    <select 
                        name="teacher_id" 
                        id="teacher_id" 
                        class="form-control shadow-sm @error('teacher_id') is-invalid @enderror" 
                        required>
                        <option value="" disabled>Select a Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" 
                                {{ old('teacher_id', $students->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Please select a teacher.</div>
                    @enderror
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
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            console.log("Bootstrap validation script loaded successfully.");
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        console.log("Form validation failed.");
                    } else {
                        console.log("Form submitted successfully.");
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
