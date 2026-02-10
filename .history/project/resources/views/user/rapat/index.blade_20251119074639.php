@extends('user.layouts.app')

@section('title', 'Rapat')

@section('content')


    <style>
        .hero-section {
            background: #0d6efd;
            padding: 80px 0;
            color: white;
            text-align: center;
        }
    </style>

    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold mb-2">Rapat</h1>
            <p class="lead mb-0">Informasi Rapat Dewan Ambalan</p>
        </div>
    </section>

    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route }}"></form>
        </div>
    </section>
@endsection
