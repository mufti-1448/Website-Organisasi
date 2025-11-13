@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Selamat Datang di Website Organisasi</h1>
                <p class="text-center">Ini adalah halaman beranda untuk pengguna umum.</p>
        <a href="{{ $sosialMedia['linkedin']->url }}" class="btn btn-primary btn-lg rounded-circle"
                                target="_blank" title="LinkedIn">
                                <i class="bi bi-linkedin fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['youtube']) && $sosialMedia['youtube']->aktif)
                            <a href="{{ $sosialMedia['youtube']->url }}" class="btn btn-danger btn-lg rounded-circle"
                                target="_blank" title="YouTube">
                                <i class="bi bi-youtube fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['tiktok']) && $sosialMedia['tiktok']->aktif)
                            <a href="{{ $sosialMedia['tiktok']->url }}" class="btn btn-dark btn-lg rounded-circle"
                                target="_blank" title="TikTok">
                                <i class="bi bi-tiktok fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['whatsapp']) && $sosialMedia['whatsapp']->aktif)
                            <a href="{{ $sosialMedia['whatsapp']->url }}" class="btn btn-success btn-lg rounded-circle"
                                target="_blank" title="WhatsApp">
                                <i class="bi bi-whatsapp fs-4"></i>
                            </a>
                        @endif
                    </div>
                {{-- Media Sosial --}}
                <div class="text-center mt-5">
                    <h3 class="mb-4">Ikuti Kami di Media Sosial</h3>
                    <div class="d-flex justify-content-center gap-3">
                        @if (isset($sosialMedia['facebook']) && $sosialMedia['facebook']->aktif)
                            <a href="{{ $sosialMedia['facebook']->url }}" class="btn btn-primary btn-lg rounded-circle"
                                target="_blank" title="Facebook">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['instagram']) && $sosialMedia['instagram']->aktif)
                            <a href="{{ $sosialMedia['instagram']->url }}" class="btn btn-danger btn-lg rounded-circle"
                                target="_blank" title="Instagram">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['twitter']) && $sosialMedia['twitter']->aktif)
                            <a href="{{ $sosialMedia['twitter']->url }}" class="btn btn-info btn-lg rounded-circle"
                                target="_blank" title="Twitter">
                                <i class="bi bi-twitter fs-4"></i>
                            </a>
                        @endif
                        @if (isset($sosialMedia['linkedin']) && $sosialMedia['linkedin']->aktif)
                    
                </div>
            </div>
        </div>
    </div>
@endsection
