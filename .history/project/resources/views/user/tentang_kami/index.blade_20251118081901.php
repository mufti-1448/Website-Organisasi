@extends('user.layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    <style>
        .hero-section {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border-radius: 0;
        }

        .section-line {
            width: 80px
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

        </div>
    </section>
@endsection
