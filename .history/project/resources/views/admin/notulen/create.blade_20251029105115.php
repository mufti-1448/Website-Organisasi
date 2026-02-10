@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-journal-text"></i> Tambah Notulen</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('notulen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="notulenTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Notulen</button>
                </li>
                <li class="nav-item">
