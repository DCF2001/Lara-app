<!-- Common Sidebar and Main Layout -->
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
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1rem;
            display: block;
            border-radius: 5px;
            margin-bottom: 10px;
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

        .card-header {
            font-size: 1.25rem;
        }

        /* Hidden by default */
        .content-hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column">
            <h2 class="text-center">Admin Panel</h2>
            <a href="#" id="manageStudentsTab">Manage Students</a>
            <a href="#" id="teachersTab">Teachers</a>
            <a href="#">Enrolment</a>
            <a href="#">Courses</a>
            <a href="#">Payment</a>
        </div>

        <!-- Main Content -->
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-4">Welcome, Admin!</h1>
                </div>
            </div class ="col-md-9">

            @yeild('content')

        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
