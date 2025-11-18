@extends('user.layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border-radius: 0;
        }

        .section-line {
            width: 80px;
            height: 4px;
            background: #0d6efd;
            border-radius: 5px;
        }

        .tentang-img {
            max-width: 90%;
            height: auto;
        }
    </style>

    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">Tentang Kami</h1>
            <p class="lead">Kenali lebih dekat organisasi Dewan Ambalan</p>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Sejarah Singkat</h2>
                <div class="section-line mx-auto"></div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <p class="text-muted mb-4">
                        Dewan Ambalan merupakan organisasi kepramukaan tingkat Pramuka Penegak dan Pandega
                        yang berdiri sejak tahun 1985. Organisasi ini terbentuk dari semangat para pemuda
                        untuk mengembangkan kepemimpinan dan karakter melalui kegiatan kepramukaan.
                    </p>

                    <p class="text-muted mb-4">
                        Selama lebih dari tiga dekade, Dewan Ambalan telah menjadi wadah pembinaan generasi muda
                        yang berkarakter, mandiri, dan memiliki jiwa kepemimpinan. Berbagai program dan kegiatan
                        telah dilaksanakan untuk mencapai tujuan tersebut.
                    </p>

                    <p class="text-muted">
                        Hingga saat ini, Dewan Ambalan terus berkembang dan berinovasi dalam menjalankan misi
                        pembentukan karakter pemuda Indonesia yang berakhlak mulia dan berwawasan luas.
                    </p>
                </div>

                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/herosection/hero1.png') }}" alt="Gedung Dewan Ambalan" class="img-fluid rounded-4 shadow-lg tentang-img">
                </div>
            </div>
        </div>
    </section>

    <section class="organisation-section py-5">
        <div class="container">

            h
        </div>

    </section>
@endsection
