@extends('user.layouts.app')

@section('title', 'Notulen')

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
            <h1 class="fw-bold mb-2">Notulen</h1>
            <p class="lead mb-0">Informasi Lengkap Notulen Dewan Ambalan</p>
        </div>
    </section>

    <section class="py-4">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('user.rapat.index') }}" method="GET" class="col-md-5">
                <div class="search-wraper">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari rapat..."
                        value="{{ request('search') }}">
                    @if (request('search'))
                        <a href="{{ route('user.rapat.index') }}" class="clear-search-btn" title="Clear search">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    @if (request('search'))
        <div class="text-center mb-3">
            <small class="text-muted">
                Menampilkan {{ $notulen->count() }} dari {{ $notulen->total() }} hasil untuk
                "{{ request('search') }}"
            </small>
        </div>
    @endif
@endsection
