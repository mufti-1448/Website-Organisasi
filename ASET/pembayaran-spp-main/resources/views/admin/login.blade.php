<x-login-layout>
    <div class="container py-5">
        <div class="row g-0 shadow-sm rounded overflow-hidden">
            <!-- Left Side - Branding -->
            <div class="col-md-6 d-none d-md-flex bg-primary text-white align-i1tems-center justify-content-center p-4">
                <div class="text-center">
                    <!-- Tambahkan gambar -->
                    <img src="{{ asset('assets/images/banner.png') }}" alt="Ilustrasi Pembayaran" class="img-fluid mb-3" style="max-height: 300px;">
                    <!-- Judul dan deskripsi -->
                    <h2 class="mb-2">Sistem Pembayaran SPP</h2>
                    <p class="mb-0">Solusi modern untuk pengelolaan pembayaran sekolah</p>
                </div>
            </div>


            <!-- Right Side - Login Form -->
            <div class="col-md-6 bg-white">
                <div class="p-4">
                    <div class="text-center mb-4">
                        <h3 class="mb-1">Login Administrator</h3>
                        <p class="text-muted small">Silakan masuk untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text bg-white border-start-0">
                                    <button type="button" onclick="togglePassword()"
                                        class="btn p-0 border-0 bg-transparent shadow-none">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </span>
                            </div>
                        </div>


                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="text-center mt-3 small text-muted">
                            Email: admin@codepelita.com<br>
                            Password: password123
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Alert Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="loginAlert"
            class="toast align-items-center text-white bg-danger border-0 @error('email') show @else d-none @enderror"
            role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="alertMessage">
                        @error('email')
                            {{ $message }}
                        @else
                            Username atau password salah!
                        @enderror
                    </span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
</x-login-layout>
