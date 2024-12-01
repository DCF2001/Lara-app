<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-width: 250px;
            max-width: 300px;
            background-color: #343a40;
            color: white;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .sidebar.collapsed {
            max-width: 70px;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            text-align: center;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid #495057;
        }

        .welcome-message {
            margin-bottom: 40px;
            padding: 20px;
            background: #0d6efd;
            color: white;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column">
        <div class="logo">Student Management</div>
        <button class="btn btn-dark m-2" id="toggleSidebar">☰</button>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ url('/students') }}" class="nav-link">
                    <i class="bi bi-person"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/teachers') }}" class="nav-link">
                    <i class="bi bi-people"></i>
                    <span>Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-mortarboard"></i>
                    <span>Enrollment</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-calendar-check"></i>
                    <span>Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-journal"></i>
                    <span>Payments</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <!-- Welcome Message -->
        <div class="welcome-message">
            <h1>Welcome Back, Admin!</h1>
            <p>Manage your students, teachers, and other details efficiently from the dashboard below.</p>
        </div>

        <!-- Dynamic Content -->
        <div class="mt-4">
            @yield('content')
        </div>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>

    <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
