@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Selamat Datang di Website Organisasi</h1>
                <p class="text-center">Ini adalah halaman beranda untuk pengguna umum.</p>
            </div>
        </div>
    </div>

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            {{-- Slide 1 --}}
            <div class="caraousel-item active">
                <div class="position-relative">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
