@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3><i class="bi bi-reply"></i> Balas Pesan</h3>
    <hr>

    <div class="card p-3 shadow-sm mb-4">
        <h5>Pesan Asli:</h5>
        <p><strong>Dari:</strong> {{ $pesan->nama }} ({{ $pesan->email }})</p>
        <p><strong>Tanggal:</strong> {{ $pesan->tanggal }}</p>
        <p><strong>Pesan:</strong></p>
        <blockquote class="blockquote">
            {{ $pesan->pesan }}
        </blockquote>
    </div>

    <form action="{{ route('kontak.sendReply', $pesan->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="subject" class="form-label">Subjek Email</label>
            <input type="text" name="subject" id="subject" class="form-control" value="Re: Pesan dari {{ $pesan->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan Balasan</label>
            <textarea name="message" id="message" rows="8" class="form-control" placeholder="Tulis balasan Anda di sini..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
        <a href="{{ route('kontak.show', $pesan->id) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
