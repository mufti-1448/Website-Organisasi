<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dewan Ambalan SMK Syafii Akrom')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('data-tabels/datatables.min.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/icon/favicon.png') }}">

    <!-- jQuery (diperlukan untuk DataTables) -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            transition: color 0.2s;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
        }

        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
            font-weight: 600;
        }

        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    {{-- Navbar --}}
    @include('user.layouts.navbar')

    {{-- Main Content --}}
    <main class=" flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('user.layouts.footer')

    {{-- Bootstrap JS (offline) --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables JS --}}
    <script src="{{ asset('data-tabels/datatables.min.js') }}"></script>

    {{-- Additional Scripts --}}
    @yield('scripts')
</body>

</html>
