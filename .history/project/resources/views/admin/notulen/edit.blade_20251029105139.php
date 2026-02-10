@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Notulen</h3>

        <form action="{{ route('notulen.update', $notulen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="notulenTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail"
                        type="button">Detail Notulen</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file"
                        type="button">File</button>
