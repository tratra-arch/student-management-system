<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department | Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
            font-family: Arial, sans-serif;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background: #4338ca;
            border-color: #4338ca;
        }
    </style>
</head>

<body>
    <main class="container py-5" style="max-width: 760px;">
        <a href="{{ route('departments.index') }}"
           class="text-decoration-none">
            ← Back to Departments
        </a>

        <div class="form-card mt-4">
            <h1 class="fw-bold mb-2">Edit Department</h1>

            <p class="text-secondary mb-4">
                Update the department information.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('departments.update', $department) }}"
            >
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="dept_name" class="form-label">
                        Department Name *
                    </label>

                    <input
                        type="text"
                        id="dept_name"
                        name="dept_name"
                        class="form-control"
                        value="{{ old('dept_name', $department->dept_name) }}"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="manager_id" class="form-label">
                        Manager ID
                    </label>

                    <input
                        type="number"
                        id="manager_id"
                        name="manager_id"
                        class="form-control"
                        value="{{ old('manager_id', $department->manager_id) }}"
                        min="1"
                    >
                </div>

                <div class="mb-4">
                    <label for="location_id" class="form-label">
                        Location ID
                    </label>

                    <input
                        type="number"
                        id="location_id"
                        name="location_id"
                        class="form-control"
                        value="{{ old('location_id', $department->location_id) }}"
                        min="1"
                    >
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        Update Department
                    </button>

                    <a href="{{ route('departments.index') }}"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>