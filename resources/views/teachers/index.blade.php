@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0 text-center">Teacher Portal</h3>
        </div>
        <div class="card-body">
            <!-- Search Bar -->
            <form action="{{ url('/teachers') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Search by Teacher Name..." 
                        value="{{ old('search', $search ?? '') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </form>
            
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title">Manage Teachers</h5>
                <a href="{{ url('/teachers/create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
            @if($teachers->isEmpty())
                <div class="alert alert-warning text-center">
                    No teachers found. Try adjusting your search or click "Add New" to create a teacher.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/teachers/' . $item->id) }}" class="btn btn-info btn-sm" title="View Teacher">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/teachers/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm" title="Edit Teacher">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ url('/teachers/' . $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm('Are you sure you want to delete this Teacher?');">
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
            <small class="text-muted">Teacher Management System &copy; {{ date('Y') }}</small>
        </div>
    </div>
</div>
@endsection
