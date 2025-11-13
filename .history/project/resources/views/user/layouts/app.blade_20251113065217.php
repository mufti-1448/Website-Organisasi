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

    <!-- jQuery (diperlukan untuk DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        
    </style>
</head>

<body>
    {{-- Bootstrap JS (offline) --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables JS --}}
    <script src="{{ asset('data-tabels/datatables.min.js') }}"></script>

    {{-- Additional Scripts --}}
    @yield('scripts')
</body>

</html>
