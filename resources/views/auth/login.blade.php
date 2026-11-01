<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Management</title>

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
            <h2 class="fw-bold mt-4">Welcome back</h2>
            <p class="text-secondary">Log in to continue.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

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
                    autofocus
                    autocomplete="email"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Log in
            </button>
        </form>

        <p class="text-center text-secondary mt-4 mb-0">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-decoration-none">
                Register
            </a>
        </p>
    </div>
</body>
</html>