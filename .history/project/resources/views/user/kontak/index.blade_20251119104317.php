@extends('user.layouts.app')

@section('title', 'Kontak Kami')

@section('content')

    <style>
        :root {
            --card-radius: 14px;
            --accent: #2563eb;
            --muted: #6b7280;
        }

        .contact-hero {
            padding: 3.5rem 0 2.5rem;
            text-align: center;
        }

        .contact-hero h1 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: .5rem;
        }

        .contact-hero p {
            color: var(--muted);
            margin-bottom: 0;
            font-size: 1.05rem;
        }

        .contact-card {
            border-radius: var(--card-radius);
            padding: 1.6rem;
            background: #fff;
            border: 1px solid #eef2f6;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
        }

        .contact-list .item i {
            font-size: 1.35rem;
            color: var(--accent);
            width: 34px;
        }

        .contact-list .item h6 {
            margin: 0 0 .15rem 0;
            font-weight: 600;
        }

        .contact-list .item p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
        }

        .social a { color: var(--accent); font-size: 1.25rem; margin-right: .6rem; }

        .map-embed {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e9eef5;
            min-height: 240px;
            background: linear-gradient(180deg,#f8fafc,#f1f5f9);
        }

        @media (max-width: 575.98px){
            .contact-hero h1{font-size:1.8rem}
        }
    </style>

    <div class="container py-5">

        <div class="contact-hero">
            <h1>Kontak Kami</h1>
            <p>Butuh bantuan atau ingin berkolaborasi? Hubungi kami melalui formulir atau salah satu kontak di bawah.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="contact-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="mb-3">Informasi Kantor</h5>

                        <div class="contact-list">
                            <div class="d-flex gap-3 mb-3 item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <div>
                                    <h6>Alamat</h6>
                                    <p>Jl. Contoh No. 123, Kecamatan, Kota — Provinsi 12345</p>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mb-3 item">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <h6>Telepon</h6>
                                    <p><a href="tel:+62211234567">(021) 123-4567</a></p>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mb-3 item">
                                <i class="bi bi-envelope-fill"></i>
                                <div>
                                    <h6>Email</h6>
                                    <p><a href="mailto:info@organisasi.com">info@organisasi.com</a></p>
                                </div>
                            </div>

                            <div class="d-flex gap-3 item">
                                <i class="bi bi-clock-fill"></i>
                                <div>
                                    <h6>Jam Kerja</h6>
                                    <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 08:00 - 12:00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">Ikuti kami:</div>
                            <div class="social">
                                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="post" action="#" class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama lengkap" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Subjek</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subjek pesan" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="map-embed">
                            <!-- Replace the src with your Google Maps embed URL or leave placeholder -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.9999999999995!2d106.827153!3d-6.175392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3df00000001%3A0x0!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v0000000000000"
                                width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
