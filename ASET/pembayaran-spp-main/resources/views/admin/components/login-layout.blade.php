<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pembayaran SPP</title>
    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: 20px;
        }

        .login-image {
            background: url('https://picsum.photos/seed/school/600/800') center/cover;
            min-height: 600px;
            position: relative;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(78, 115, 223, 0.8) 0%, rgba(224, 64, 251, 0.8) 100%);
        }

        .login-form {
            padding: 40px;
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: white;
            font-size: 2rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .social-login {
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
            margin-top: 30px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            transition: all 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .login-image {
                display: none;
            }

            .login-form {
                padding: 30px 20px;
            }
        }

        .floating-label {
            position: relative;
        }

        .floating-label input:focus ~ label,
        .floating-label input:not(:placeholder-shown) ~ label {
            transform: translateY(-25px) scale(0.85);
            color: #667eea;
        }

        .floating-label label {
            position: absolute;
            left: 12px;
            top: 12px;
            transition: all 0.3s;
            pointer-events: none;
            color: #6c757d;
        }
    </style>
</head>
<body>
    {{ $slot }}
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // // Handle login form submission
        // function handleLogin(event) {
        //     event.preventDefault();

        //     const username = document.getElementById('username').value;
        //     const password = document.getElementById('password').value;
        //     const rememberMe = document.getElementById('rememberMe').checked;

        //     // Simulate login validation
        //     // In real application, this should be an API call
        //     if (username === 'admin' && password === 'admin') {
        //         // Save remember me preference
        //         if (rememberMe) {
        //             localStorage.setItem('rememberUser', username);
        //         } else {
        //             localStorage.removeItem('rememberUser');
        //         }

        //         // Show success message
        //         showSuccessAlert();

        //         // Redirect to admin panel after delay
        //         setTimeout(() => {
        //             const dashboardUrl = '/dashboard';
        //             window.location.href = dashboardUrl;
        //         }, 1500);
        //     } else {
        //         // Show error message
        //         showAlert('Username atau password salah!');
        //     }
        // }

        //     // Show error alert
        //     function showAlert(message) {
        //         const alertEl = document.getElementById('loginAlert');
        //         const messageEl = document.getElementById('alertMessage');

        //         messageEl.textContent = message;
        //         alertEl.classList.remove('bg-success');
        //         alertEl.classList.add('bg-danger');

        //         const toast = new bootstrap.Toast(alertEl);
        //         toast.show();
        //     }

        //     // Show success alert
        //     function showSuccessAlert() {
        //         const alertEl = document.getElementById('loginAlert');
        //         const messageEl = document.getElementById('alertMessage');

        //         messageEl.textContent = 'Login berhasil! Mengalihkan...';
        //         alertEl.classList.remove('bg-danger');
        //         alertEl.classList.add('bg-success');

        //         const toast = new bootstrap.Toast(alertEl);
        //         toast.show();
        //     }

        //     // Check for remembered user
        //     window.addEventListener('DOMContentLoaded', () => {
        //         const rememberedUser = localStorage.getItem('rememberUser');
        //         if (rememberedUser) {
        //             document.getElementById('username').value = rememberedUser;
        //             document.getElementById('rememberMe').checked = true;
        //         }
        //     });

        //     // Add enter key support for login
        //     document.getElementById('password').addEventListener('keypress', (e) => {
        //         if (e.key === 'Enter') {
        //             document.getElementById('loginForm').dispatchEvent(new Event('submit'));
        //         }
        //     });

        //     // Demo credentials tooltip
        //     // document.addEventListener('DOMContentLoaded', () => {
        //     //     const form = document.getElementById('loginForm');
        //     //     const tooltip = document.createElement('div');
        //     //     tooltip.className = 'alert alert-info alert-dismissible fade show mt-3';
        //     //     tooltip.innerHTML = `
        //     //         <strong>Demo Login:</strong><br>
        //     //         Username: admin<br>
        //     //         Password: admin
        //     //         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        //     //     `;
        //     //     form.appendChild(tooltip);
        //     // });
    </script>
</body>
</html>
