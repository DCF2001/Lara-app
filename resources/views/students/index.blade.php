@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0 text-center">Student Portal</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title">Manage Students</h5>
                <a href="{{ url('/students/create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
            @if($students->isEmpty())
                <div class="alert alert-warning text-center">
                    No students available. Click "Add New" to create the first student.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/students/' . $item->id) }}" class="btn btn-info btn-sm" title="View Student">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/students/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm" title="Edit Student">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ url('/students/' . $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Are you sure you want to delete this student?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer text-center">
            <small class="text-muted">Student Management System &copy; {{ date('Y') }}</small>
        </div>
    </div>
</div>
@endsection
