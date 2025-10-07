<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Coba Bootstrap Offline</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-4">🎨 Uji Coba Bootstrap & Icons Offline</h1>

        <div class="card shadow p-4">
            <h4 class="mb-3 text-primary">
                <i class="bi bi-bootstrap-fill me-2"></i>Bootstrap Berhasil Dijalankan!
            </h4>

            <p>Jika tampilan ini terlihat rapi dengan gaya Bootstrap, artinya file CSS sudah terbaca dari folder <code>public/bootstrap/</code>.</p>

            <hr>

            <div class="d-flex justify-content-around my-4">
                <button class="btn btn-primary">
                    <i class="bi bi-alarm"></i> Alarm
                </button>
                <button class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Sukses
                </button>
                <button class="btn btn-danger">
                    <i class="bi bi-exclamation-triangle"></i> Peringatan
                </button>
            </div>

            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> Ini contoh alert Bootstrap.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
