@extends('user.layouts.app')

@section('title', 'Anggota')

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border-radius: 0;
        }
    </style>
    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            <h1 class="fw-bold mb-3">AAnggota</h1>
            <p class="lead">Berikut adalah daftar anggota Dewan Ambalan yang aktif berpartisipasi dalam kegiatan organisasi</p>
        </div>
    </section>

@endsection
