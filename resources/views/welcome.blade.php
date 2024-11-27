<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding: 1rem;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1rem;
            display: block;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .btn-edit {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h2 class="text-center">Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Manage Students</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Welcome, Admin!</h1>
            </div>

            <!-- Cards -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Attendance</h5>
                        <p class="card-text">95%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">New Admissions</h5>
                        <p class="card-text">20</p>
                    </div>
                </div>
            </div>

            <!-- Student Table -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Student List
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>10</td>
                                <td>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>9</td>
                                <td>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-md-12 mt-4">
                <h3>Quick Actions</h3>
                <button class="btn btn-primary me-2">Add New Student</button>
                <button class="btn btn-success me-2">View Attendance</button>
                <button class="btn btn-info">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
