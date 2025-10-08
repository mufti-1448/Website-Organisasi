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

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
        }

        .content-wrapper {
            padding: 20px;
        }

        .navbar-brand {
            font-weight: 600;
        }
        <>
.text-truncate-cell {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 250px; /* ubah sesuai kebutuhan */
}

    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            @include('layouts.sidebar')

            {{-- Konten Halaman --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-wrapper">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Bootstrap JS (offline) --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
