@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Pengaturan Website</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="pengaturanTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pengaturan-tab" data-bs-toggle="tab" data-bs-target="#pengaturan" type="button" role="tab">Pengaturan Web</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="carousel-tab" data-bs-toggle="tab" data-bs-target="#carousel" type="button" role="tab">Carousel</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab">Profil Organisasi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tentang-tab" data-bs-toggle="tab" data-bs-target="#tentang" type="button" role="tab">Tentang Kami</button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="pengaturanTabContent">
                <!-- Pengaturan Web Tab -->
                <div class="tab-pane fade show active" id="pengaturan" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Pengaturan Web</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pengaturan-web.update', $pengaturan->id ?? '') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama_organisasi" class="form-label">Nama Organisasi</label>
                                            <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" value="{{ old('nama_organisasi', $pengaturan->nama_organisasi ?? '') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                            @if($pengaturan && $pengaturan->logo)
                                                <img src="{{ asset('storage/' . $pengaturan->logo) }}" alt="Logo" class="mt-2" style="max-width: 100px;">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="favicon" class="form-label">Favicon</label>
                                            <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*">
                                            @if($pengaturan && $pengaturan->favicon)
                                                <img src="{{ asset('storage/' . $pengaturan->favicon) }}" alt="Favicon" class="mt-2" style="max-width: 50px;">
                                            @endif
