@extends('user.layouts.app')

@section('title', 'Kontak Kami')

@section('content')

<style>
    :root {
        --accent: #2563eb;
        --text: #374151;
        --muted: #6b7280;
        --radius: 14px;
    }

    .contact-hero {
        text-align: center;
        padding: 3rem 0 2rem;
    }

    .contact-hero h1 {
        font-size: 2.4rem;
        font-weight: 700;
    }

    .contact-hero p {
        color: var(--muted);
        margin-top: .4rem;
    }

    .contact-card {
        background: #fff;
        border-radius: var(--radius);
        border: 1px solid #eef2f6;
        padding: 1.8rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .04);
    }

    .contact-item {
        display: flex;
        gap: .9rem;
        margin-bottom: 1rem;
    }

    .contact-item i {
        color: var(--accent);
        font-size: 1.35rem;
    }

    .contact-item h6 {
        margin: 0;
        font-weight: 600;
        color: var(--text);
    }

    .contact-item p,
    .contact-item a {
        margin: 0;
        color: var(--muted);
        font-size: .96rem;
    }

    .social a {
        color: var(--accent);
        margin-right: .6rem;
        font-size: 1.25rem;
        transition: .2s ease;
    }

    .social a:hover {
        opacity: .7;
        transform: translateY(-2px);
    }
</style>

<div class="container py-4">

    <!-- Header -->
    <div class="contact-hero">
        <h1>Kontak Kami</h1>
        <p>Butuh bantuan atau ingin berkolaborasi? Hubungi kami melalui kontak di bawah.</p>
    </div>

    <!-- Card -->
    <div class="contact-card mx-auto" style="max-width: 650px;">

        <h5 class="mb-3">Informasi Kantor</h5>

        <div>

            <div class="contact-item">
                <i class="bi bi-geo-alt-fill"></i>
                <div>
                    <h6>Alamat</h6>
                    <p>Jenggot, Kec. Pekalongan Sel., Kota Pekalongan, Jawa Tengah 51133</p>
                </div>
            </div>

            <div class="contact-item">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h6>Telepon</h6>
                    <p><a href="tel:+6285283983634">085283983634</a></p>
                </div>
            </div>

            <div class="contact-item">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h6>Email</h6>
                    <p><a href="mailto:info@dewanambalan.org">info@dewanambalan.org</a></p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Social Media -->
        <div class="d-flex align-items-center">
            <span class="me-3">Ikuti kami:</span>
            <div class="social">
                <a href="https://www.tiktok.com/@scoutsmksa?is_from_webapp=1&sender_device=pc" aria-label="Tiktok"><i><i class="bi bi-tiktok"></i></i></a>
                <a href="https://www.instagram.com/scouts.smksa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

    </div>

</div>

@endsection
