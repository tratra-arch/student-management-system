<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Department Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            color: #212529;
            font-family: Arial, sans-serif;
        }

        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.7px;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #7a8190;
            margin: 0;
            font-size: 14px;
        }

        .panel {
            background: #fff;
            border: 1px solid #e9ebf0;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(20, 30, 60, 0.035);
        }

        .stat-card {
            padding: 22px;
            height: 100%;
        }

        .stat-label {
            color: #7a8190;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .toolbar {
            padding: 20px;
            border-bottom: 1px solid #eceef2;
        }

        .form-control,
        .btn {
            border-radius: 8px;
        }

        .form-control {
            padding: 10px 13px;
            border-color: #e0e3e9;
        }

        .form-control:focus {
            border-color: #8096ff;
            box-shadow: 0 0 0 3px rgba(72, 101, 255, 0.1);
        }

        .btn {
            padding: 9px 14px;
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

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #fafbfc;
            color: #777f8f;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 16px 20px;
            border-bottom: 1px solid #eceef2;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 20px;
            vertical-align: middle;
            border-color: #f0f1f4;
            font-size: 13px;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .department-name {
            font-weight: 600;
            color: #252a35;
        }

        .department-id {
            color: #7a8190;
            font-size: 12px;
        }

        .department-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 6px;
            background: #f0f1ff;
            color: #343aeb;
            font-size: 12px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .table-footer {
            padding: 18px 20px;
            border-top: 1px solid #eceef2;
        }

        .pagination {
            margin-bottom: 0;
            gap: 4px;
        }

        .page-link {
            border-radius: 6px !important;
            border-color: #e5e7eb;
            color: #343aeb;
            font-size: 13px;
        }

        .page-item.active .page-link {
            background: #343aeb;
            border-color: #343aeb;
        }

        .navigation {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
        }

        .navigation a {
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 24px 14px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    <div class="navigation">
        <a href="{{ route('dashboard') }}"
           class="btn btn-outline-secondary">
            ← Dashboard
        </a>

        <a href="{{ route('students.index') }}"
           class="btn btn-outline-secondary">
            Students
        </a>
    </div>

    <div class="page-header">
        <div>
            <h1 class="page-title">Department Management</h1>
            <p class="page-subtitle">
                Manage academic departments and their assigned students.
            </p>
        </div>

        <a href="{{ route('departments.create') }}"
           class="btn btn-primary">
            + Add Department
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success panel mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger panel mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="panel stat-card">
                <div class="stat-label">Total Departments</div>
                <p class="stat-value">{{ $departments->total() }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel stat-card">
                <div class="stat-label">Current Page</div>
                <p class="stat-value">{{ $departments->currentPage() }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel stat-card">
                <div class="stat-label">Records Per Page</div>
                <p class="stat-value">{{ $departments->count() }}</p>
            </div>
        </div>
    </div>

    <div class="panel">

        <div class="toolbar">
            <form method="GET"
                  action="{{ route('departments.index') }}"
                  class="row g-2">

                <div class="col-md-6">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search department name..."
                        value="{{ $search }}"
                    >
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>

                <div class="col-auto">
                    <a href="{{ route('departments.index') }}"
                       class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Manager ID</th>
                        <th>Location ID</th>
                        <th>Total Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($departments as $department)
                        <tr>
                            <td>
                                <div class="department-name">
                                    {{ $department->dept_name }}
                                </div>

                                <div class="department-id">
                                    ID: {{ $department->dept_id }}
                                </div>
                            </td>

                            <td>{{ $department->manager_id ?? '—' }}</td>

                            <td>{{ $department->location_id ?? '—' }}</td>

                            <td>
                                <span class="department-badge">
                                    {{ $department->students_count }}
                                    {{ $department->students_count === 1 ? 'Student' : 'Students' }}
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a
                                        href="{{ route('departments.edit', $department) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('departments.destroy', $department) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this department?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="text-center py-5 text-muted">
                                No departments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer d-flex justify-content-between
                    align-items-center flex-wrap gap-3">

            <small class="text-muted">
                Showing {{ $departments->firstItem() ?? 0 }}
                to {{ $departments->lastItem() ?? 0 }}
                of {{ $departments->total() }} departments
            </small>

            {{ $departments->links() }}
        </div>

    </div>

</div>

</body>
</html>