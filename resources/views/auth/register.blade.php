<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: white;
            padding: 38px;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.07);
        }

        .brand {
            font-weight: 800;
            color: #4338ca;
            letter-spacing: -0.5px;
        }

        .form-control {
            padding: 12px;
            border-radius: 9px;
        }

        .btn-primary {
            background: #4338ca;
            border-color: #4338ca;
            padding: 12px;
            border-radius: 9px;
        }

        .btn-primary:hover {
            background: #3730a3;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="text-center mb-4">
            <div class="brand fs-4">STUDENT MANAGEMENT</div>
            <h2 class="fw-bold mt-4">Create account</h2>
            <p class="text-secondary">Register to manage student records.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                    autocomplete="name"
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="you@example.com"
                    required
                    autocomplete="email"
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="At least 8 characters"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Confirm password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Enter your password again"
                    required
                    autocomplete="new-password"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Create account
            </button>
        </form>

        <p class="text-center text-secondary mt-4 mb-0">
            Already have an account?
            <a href="{{ route('login') }}" class="text-decoration-none">
                Log in
            </a>
        </p>
    </div>
</body>
</html>