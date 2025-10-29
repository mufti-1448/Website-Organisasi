<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Tidak Ditemukan</title>
    <style>
        /* Reset basic */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 480px;
            background: white;
            padding: 40px 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 12px;
        }

        h1 {
            font-size: 6rem;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        p {
            font-size: 1.125rem;
            margin-bottom: 30px;
            color: #555;
            line-height: 1.5;
        }

        a.btn-back {
            display: inline-block;
            padding: 12px 28px;
            font-size: 1rem;
            color: white;
            background-color: #3498db;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            user-select: none;
        }

        a.btn-back:hover,
        a.btn-back:focus {
            background-color: #217dbb;
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 4.5rem;
            }

            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container" role="main">
        <h1>404</h1>
        <h2>Halaman Tidak Ditemukan</h2>
        <p>Maaf, halaman yang Anda cari tidak tersedia atau mungkin telah dipindahkan.</p>
        <a href="{{ url('/') }}" class="btn-back" role="button" aria-label="Kembali ke Beranda">Kembali ke Beranda</a>
    </div>
</body>
</html>
