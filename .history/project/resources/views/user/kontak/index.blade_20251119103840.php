@extends('user.layouts.app')

@section('title', 'Kontak Kami')

@section('content')

    <style>
        /* Modern Contact Card */
        .contact-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 32px;
            border: 1px solid #f1f1f1;
            transition: 0.25s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.06);
        }

        /* Title Styling */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
        }

        /* Contact info lines */
        .contact-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .contact-item i {
            font-size: 1.6rem;
            color: #2563eb;
            padding-top: 3px;
        }

        .contact-item h3 {
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .contact-item p {
            color: #6b7280;
        }

        /* Social media icons */
        .social a {
            font-size: 1.9rem;
            transition: 0.25s;
        }

        .social a:hover {
            transform: translateY(-2px);
            opacity: .8;
        }

        /* Map block */
        .map-placeholder {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            border-radius: 16px;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #6b7280;
        }
    </style>

    
    <div class="container mx-auto px-4 py-14 max-w-5xl">

        <!-- Header -->
        <div class="text-center mb-14">
            <h1 class="text-5xl font-bold text-gray-900 mb-3">Kontak Kami</h1>
            <p class="text-gray-600 text-lg">Kami siap membantu Anda kapanpun Anda membutuhkan informasi.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-10">

            <!-- Contact Information -->
            <div class="contact-card">

                <h2 class="section-title mb-6">Informasi Kontak</h2>

                <div class="space-y-6">

                    <!-- Address -->
                    <div class="contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Jl. Contoh No. 123<br>Kota, Provinsi 12345</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="contact-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p>(021) 123-4567</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <h3>Email</h3>
                            <p>info@organisasi.com</p>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="contact-item">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <h3>Jam Kerja</h3>
                            <p>
                                Senin - Jumat: 08:00 - 17:00<br>
                                Sabtu: 08:00 - 12:00<br>
                                Minggu: Tutup
                            </p>
                        </div>
                    </div>
                </div>

                <div class="social mt-10 flex space-x-5">
                    <a href="#" class="text-blue-600"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-sky-400"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-pink-600"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-red-600"><i class="bi bi-youtube"></i></a>
                </div>

            </div>

            <!-- Map Section -->
            <div class="contact-card">
                <h2 class="section-title mb-6">Lokasi Kami</h2>

                <div class="map-placeholder">
                    <i class="bi bi-geo-alt text-5xl mb-3"></i>
                    <p>Peta akan ditampilkan di sini</p>
                    <span class="text-sm mt-2">Koordinat: -6.2088, 106.8456</span>
                </div>
            </div>

        </div>

    </div>

@endsection
