
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | Student Management</title>

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

        .btn-primary:hover {
            background: #3730a3;
            border-color: #3730a3;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <main class="container py-5" style="max-width: 850px;">

        <a href="{{ route('students.index') }}"
           class="text-decoration-none">
            ← Back to Students
        </a>

        <div class="form-card mt-4">

            <h1 class="fw-bold mb-2">Add New Student</h1>

            <p class="text-secondary mb-4">
                Enter the information of the new student.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>

                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('students.store') }}">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="student_name" class="form-label">
                            Student Name *
                        </label>

                        <input
                            type="text"
                            id="student_name"
                            name="student_name"
                            class="form-control"
                            value="{{ old('student_name') }}"
                            placeholder="Enter student name"
                            maxlength="150"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="enrollment" class="form-label">
                            Enrollment ID
                        </label>

                        <input
                            type="text"
                            id="enrollment"
                            name="enrollment"
                            class="form-control"
                            value="{{ old('enrollment') }}"
                            placeholder="e.g. STU005"
                            maxlength="50"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">
                            Gender
                        </label>

                        <select id="gender" name="gender" class="form-select">
                            <option value="">Select Gender</option>

                            <option value="Male" @selected(old('gender') == 'Male')>
                                Male
                            </option>

                            <option value="Female" @selected(old('gender') == 'Female')>
                                Female
                            </option>

                            <option value="Other" @selected(old('gender') == 'Other')>
                                Other
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            id="dob"
                            name="dob"
                            class="form-control"
                            value="{{ old('dob') }}"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="enrollment_date" class="form-label">
                            Enrollment Date
                        </label>

                        <input
                            type="date"
                            id="enrollment_date"
                            name="enrollment_date"
                            class="form-control"
                            value="{{ old('enrollment_date') }}"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dept_id" class="form-label">
                            Department *
                        </label>

                        <select
                            id="dept_id"
                            name="dept_id"
                            class="form-select"
                            required
                        >
                            <option value="">Select Department</option>

                            @foreach ($departments as $department)
                                <option
                                    value="{{ $department->dept_id }}"
                                    @selected(old('dept_id') == $department->dept_id)
                                >
                                    {{ $department->dept_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Additional student information..."
                        >{{ old('description') }}</textarea>
                    </div>

                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary px-4">
                        Save Student
                    </button>

                    <a href="{{ route('students.index') }}"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>
