<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            color: #212529;
            font-family: Arial, sans-serif;
        }

        .page-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.7px;
        }

        .page-subtitle {
            color: #7a8190;
            font-size: 14px;
        }

        .panel {
            background: white;
            border: 1px solid #e9ebf0;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 3px 12px rgba(20, 30, 60, 0.035);
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-color: #e0e3e9;
            border-radius: 8px;
            padding: 10px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8096ff;
            box-shadow: 0 0 0 3px rgba(72, 101, 255, 0.1);
        }

        .btn {
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-primary {
            background: #343aeb;
            border-color: #343aeb;
        }

        .btn-primary:hover {
            background: #272dc7;
            border-color: #272dc7;
        }
    </style>
</head>

<body>

<div class="page-container">

    <div class="mb-4">
        <a href="{{ route('students.index') }}"
           class="btn btn-outline-secondary mb-3">
            ← Back to Students
        </a>

        <h1 class="page-title">Edit Student</h1>

        <p class="page-subtitle">
            Update student information and academic details.
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel">

        <form action="{{ route('students.update', $student) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Student Name *</label>
                    <input
                        type="text"
                        name="student_name"
                        class="form-control"
                        value="{{ old('student_name', $student->student_name) }}"
                        maxlength="150"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Enrollment Number</label>
                    <input
                        type="text"
                        name="enrollment"
                        class="form-control"
                        value="{{ old('enrollment', $student->enrollment) }}"
                        maxlength="50"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select gender</option>
                        <option value="Male"
                            @selected(old('gender', $student->gender) === 'Male')>
                            Male
                        </option>
                        <option value="Female"
                            @selected(old('gender', $student->gender) === 'Female')>
                            Female
                        </option>
                        <option value="Other"
                            @selected(old('gender', $student->gender) === 'Other')>
                            Other
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input
                        type="date"
                        name="dob"
                        class="form-control"
                        value="{{ old('dob', $student->dob?->format('Y-m-d')) }}"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Enrollment Date</label>
                    <input
                        type="date"
                        name="enrollment_date"
                        class="form-control"
                        value="{{ old('enrollment_date', $student->enrollment_date?->format('Y-m-d')) }}"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Department *</label>
                    <select name="dept_id" class="form-select" required>
                        <option value="">Select department</option>

                        @foreach($departments as $department)
                            <option
                                value="{{ $department->dept_id }}"
                                @selected((string) old('dept_id', $student->dept_id) === (string) $department->dept_id)
                            >
                                {{ $department->dept_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                    >{{ old('description', $student->description) }}</textarea>
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('students.index') }}"
                   class="btn btn-outline-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>