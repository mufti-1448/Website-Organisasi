<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Organisasi Sekolah')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('data-tabels/datatables.min.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/icon/favicon2.jpg') }}">

    <!-- jQuery (diperlukan untuk DataTables) -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <style>
        /* Font umum untuk seluruh halaman */
        body {
            font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.95rem;
            color: #212529;
            /* Warna teks normal */
            background-color: #f8f9fa;
            /* Background seperti semula */
        }

        /* Navbar style */
        .navbar {
            font-family: "Segoe UI Semibold", "Segoe UI", Roboto, sans-serif;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Sidebar style */
        #sidebarMenu {
            font-family: "Segoe UI Semibold", "Segoe UI", Roboto, sans-serif;
            font-weight: 600;
            font-size: 0.92rem;
            background-color: #1e1e1e;
            /* warna lebih gelap dari navbar */
            color: #ccc;
            min-height: 100vh;
        }

        #sidebarMenu .nav-link {
            color: #ccc;
            padding: 10px 16px;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        #sidebarMenu .nav-link:hover,
        #sidebarMenu .nav-link.active {
            background-color: #2b2b2bdd;
            color: #fff;
        }

        /* Navbar brand */
        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* Dropdown user di navbar */
        .dropdown-menu-dark {
            background-color: #1e1e1e;
        }

        .content-wrapper {
            padding: 20px;
        }

        /* Page Header Styles */
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-top: 5px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn-custom {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-1px);
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('admin.layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            @include('admin.layouts.sidebar')

            {{-- Konten Halaman --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-wrapper">
                @yield('content')

                <footer class="main-footer mt-4">
                    <div class="container text-center py-3">
                        <span class="text-muted">&copy; {{ date('Y') }} <code>MuftiAli404</code>. All rights
                            reserved.</span>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    {{-- Bootstrap JS (offline) --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables JS --}}
    <script src="{{ asset('data-tabels/datatables.min.js') }}"></script>

    {{-- Additional Scripts --}}
    @yield('scripts')
</body>

</html>
