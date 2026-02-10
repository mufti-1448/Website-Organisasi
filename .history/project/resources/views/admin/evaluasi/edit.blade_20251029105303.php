@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Evaluasi</h3>

        <form action="{{ route('evaluasi.update', $evaluasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="evaluasiTab" role="tablist">
                <li class="nav-item">
