@extends('user.layouts.app')

@section('title', 'Detail Program Kerja')

@section('content')

<style>
    :root {
        --border: #e5e5e5;
        --text-main: #222;
        --text-sub: #555;
    }

    body {
        background: #fafafa !important;
    }

    .page-title {
        text-align: center;
        padding: 60px 0 30px;
    }

    .page-title h1 {
        font-weight: 600;
        font-size: 2rem;
        color: var(--text-main);
        margin-bottom: 6px;
    }

    .page-title p {
        color: #777;
        font-size: 0.95rem;
    }

    .minimal-box {
        background: #fff;
        padding: 2rem 2.2rem;
        border-radius: 14px;
        border: 1px solid var(--border);
        margin-bottom: 22px;
    }

    .label {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 4px;
    }

    .value {
        color: var(--text-sub);
        font-size: 0.97rem;
        line-height: 1.55;
        margin: 0;
    }

    /* BACK BUTTON (super minimal) */
    .back-btn {
        display: inline-flex;
        align-items: center;
        color: #666;
        font-size: 0.92rem;
        margin-bottom: 25px;
        transition: 0.2s;
        padding: 6px 0;
    }

    .back-btn i {
        margin-right: 6px;
    }

    .back-btn:hover {
        color: #000;
        text-decoration: none;
    }

    /* STATUS CHIP */
    .status-chip {
        font-size: 0.76rem;
        padding: 4px 10px;
        border-radius: 20px;
        border: 1px solid var(--border);
        color: #444;
        background: #f8f8f8;
        display: inline-block;
        margin-top: 4px;
    }
</style>


{{-- TITLE --}}
<section class="page-title">
    <h1>Detail Program Kerja</h1>
    <p>Informasi program kerja yang dipilih</p>
</section>


<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                {{-- back --}}
                <a href="{{ route('user.program_kerja.index') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                {{-- NAME + STATUS --}}
                <div class="minimal-box">
                    <h2 style="font-size:1.4rem;font-weight:600;color:#111;margin-bottom:6px;">
                        {{ $program->nama }}
                    </h2>

                    @php
                        $statusText = [
                            'berlangsung' => 'Berjalan',
                            'belum' => 'Direncanakan',
                            'selesai' => 'Selesai'
                        ][$program->status] ?? 'Unknown';
                    @endphp

                    <span class="status-chip">{{ $statusText }}</span>
                </div>

                {{-- DESKRIPSI --}}
                <div class="minimal-box">
                    <div class="label">Deskripsi</div>
                    <p class="value">{{ $program->deskripsi }}</p>
                </div>

                {{-- PENANGGUNG JAWAB --}}
                <div class="minimal-box">
                    <div class="label">Penanggung Jawab</div>
                    <p class="value">{{ $program->penanggungJawab->nama ?? 'Tidak ada' }}</p>
                </div>

                {{-- TANGGAL MULAI --}}
                @if ($program->tanggal_mulai)
                <div class="minimal-box">
                    <div class="label">Tanggal Mulai</div>
                    <p class="value">
                        {{ \Carbon\Carbon::parse($program->tanggal_mulai)->translatedFormat('d F Y') }}
                    </p>
                </div>
                @endif

                {{-- TANGGAL SELESAI --}}
                @if ($program->tanggal_selesai)
                <div class="minimal-box">
                    <div class="label">Tanggal Selesai</div>
                    <p class="value">
                        {{ \Carbon\Carbon::parse($program->tanggal_selesai)->translatedFormat('d F Y') }}
                    </p>
                </div>
                @endif

                {{-- ANGGARAN --}}
                @if ($program->anggaran)
                <div class="minimal-box">
                    <div class="label">Anggaran</div>
                    <p class="value">Rp {{ number_format($program->anggaran, 0, ',', '.') }}</p>
                </div>
                @endif

                {{-- LOKASI --}}
                @if ($program->lokasi)
                <div class="minimal-box">
                    <div class="label">Lokasi</div>
                    <p class="value">{{ $program->lokasi }}</p>
                </div>
                @endif

                {{-- TARGET --}}
                @if ($program->target_peserta)
                <div class="minimal-box">
                    <div class="label">Target Peserta</div>
                    <p class="value">{{ $program->target_peserta }} orang</p>
                </div>
                @endif

                {{-- SISA FIELD LAIN --}}
                @foreach ([
                    'kriteria_peserta' => 'Kriteria Peserta',
                    'indikator_keberhasilan' => 'Indikator Keberhasilan',
                    'sasaran' => 'Sasaran',
                    'tujuan' => 'Tujuan',
                    'manfaat' => 'Manfaat'
                ] as $field => $label)
                    @if ($program->$field)
                        <div class="minimal-box">
                            <div class="label">{{ $label }}</div>
                            <p class="value">{{ $program->$field }}</p>
                        </div>
                    @endif
                @endforeach

                {{-- CREATED --}}
                <div class="minimal-box">
                    <div class="label">Dibuat Pada</div>
                    <p class="value">{{ $program->created_at->translatedFormat('d F Y, H:i') }}</p>
                </div>

                {{-- UPDATED --}}
                @if ($program->updated_at != $program->created_at)
                <div class="minimal-box">
                    <div class="label">Terakhir Diupdate</div>
                    <p class="value">{{ $program->updated_at->translatedFormat('d F Y, H:i') }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

@endsection
