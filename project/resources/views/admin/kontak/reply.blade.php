@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-reply"></i> Balas Pesan</h3>
        <hr>

        <div class="card p-3 shadow-sm mb-4">
            <h5>Pesan dari: {{ $pesan->nama }}</h5>
            <p>Email: {{ $pesan->email }}</p>
            <p><strong>Tanggal:</strong> {{ $pesan->tanggal }}</p>
            <hr>
            <p><strong>Pesan:</strong></p>
            <p>{{ $pesan->pesan }}</p>
        </div>

        <div class="card p-3 shadow-sm">
            <h5>Kirim Balasan</h5>
            <form action="{{ route('kontak.sendReply', $pesan->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="subject" class="form-label">Subjek</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan Balasan</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
