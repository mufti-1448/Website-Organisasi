<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-2px);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #6c757d;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login.loading {
            pointer-events: none;
        }

        .btn-login.loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .logo i {
            font-size: 40px;
            color: white;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        @media (max-width: 576px) {
            .login-card {
                margin: 20px;
                width: calc(100% - 40px);
            }
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card login-card p-4" style="width: 420px; max-width: 90%;">
        <div class="logo-container">
            <div class="logo">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h3 class="text-dark mb-1">Admin Login</h3>
            <p class="text-muted small">Masuk ke panel administrasi</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" id="loginForm">
            @csrf
            <div class="mb-3">
                <label class="form-label text-dark fw-semibold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="admin@example.com" required
                        autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label text-dark fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-login w-100" id="loginBtn">
                <span class="btn-text">Login</span>
            </button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            const btnText = btn.querySelector('.btn-text');

            btn.classList.add('loading');
            btnText.textContent = 'Logging in...';
            btn.style.pointerEvents = 'none';

            // Optional: Add a slight delay for visual feedback
            setTimeout(() => {
                // Form will submit naturally after this
            }, 100);
        });

        // Add some interactive effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.classList.remove('focused');
            });
        });
    </script>

</body>

</html>
