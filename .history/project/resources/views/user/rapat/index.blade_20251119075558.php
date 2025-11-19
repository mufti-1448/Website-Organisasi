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

        .search-wraper input {
            height: 48px;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px;
        }

        .search-wraper {
            position: relative;
        }
        .search-wraper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .clear-search-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 15px;
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
            <form action="{{ route('user.rapat.index') }}"
            method="GET" class="col-md-5">
                <div class="search-wraper">
                    <i class="bi bi-search"></i>
                    <input type="text"
                    name="search" class="form-control" placeholder="Cari rapat..." value="{{ request('search') }}">
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
                Menampilkan {{ $rapat->count() }} dari {{ $rapat->total() }} hasil untuk
                "{{ request('search') }}"   
            </small>
        </div>
    @endif

    <section class="py-4">
        <div class="container text-center">
            <di class="row g-4">

                @forelse ($rapat as $data)
                    div.col
            </di>
        </div>
    </section>
@endsection
