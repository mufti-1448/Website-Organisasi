@extends('user.layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Tentang Dewan Ambalan</h1>
                <p class="text-center mb-5">Organisasi yang berkomitmen untuk mengembangkan potensi anggota dan berkontribusi
                    positif bagi masyarakat.</p>

                {{-- Visi --}}
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="bi bi-eye-fill text-primary fs-1 mb-3"></i>
                                <h4 class="card-title">Visi</h4>
                                <p class="card-text">Menjadi organisasi yang unggul dalam pengembangan potensi anggota dan
                                    memberikan kontribusi positif bagi masyarakat sekolah dan sekitarnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <i class="bi bi-bullseye text-success fs-1 mb-3"></i>
                                <h4 class="card-title">Misi</h4>
                                <p class="card-text">Mengembangkan potensi anggota melalui berbagai program kerja, membangun
                                    solidaritas, dan berkontribusi aktif dalam kegiatan sosial kemasyarakatan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Media Sosial --}}
                <div class="text-center">
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
                </div>
            </div>
        </div>
    </div>
@endsection
