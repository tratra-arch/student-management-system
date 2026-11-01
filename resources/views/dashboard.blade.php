<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .brand {
            color: #4338ca;
            font-weight: 800;
        }

        .welcome-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .feature-card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            height: 100%;
            border: 1px solid #e5e7eb;
        }

        .feature-number {
            color: #4338ca;
            font-size: 28px;
            font-weight: 800;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container py-2">
            <a class="navbar-brand brand" href="{{ route('dashboard') }}">
                STUDENT MANAGEMENT
            </a>

            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="welcome-card mb-4">
            <p class="text-secondary mb-2">YOUR WORKSPACE</p>

            <h1 class="fw-bold">
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <p class="text-secondary mb-0">
                Manage student records and departments from one place.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="feature-card">
                    <div class="feature-number">01</div>

                    <h4 class="fw-bold mt-3">Student Management</h4>

                    <p class="text-secondary">
                        Create, view, update, and delete student records.
                    </p>

                    <a href="{{ route('students.index') }}" class="btn btn-primary">
                            Manage Students
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="feature-card">
                    <div class="feature-number">02</div>

                    <h4 class="fw-bold mt-3">Department Management</h4>

                    <p class="text-secondary">
                        Manage departments and their associated students.
                    </p>

                    <a href="{{ route('departments.index') }}" class="btn btn-primary">
                        Manage Departments
                    </a>
                </div>
            </div>
        </div>

        <footer class="text-center text-secondary mt-5">
            Student Management System · Laravel 13
        </footer>
    </main>
</body>
</html>