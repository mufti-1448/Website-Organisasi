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
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">

            <!-- Header -->
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900">Kontak Kami</h1>
                <p class="mt-2 text-gray-600">Hubungi kami jika membutuhkan bantuan atau informasi lebih lanjut.</p>
            </header>

            <div class="grid gap-8 max-w-2xl mx-auto">

                <!-- Contact Card -->
                <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Informasi Kontak</h2>

                    <div class="space-y-6">

                        <!-- Each item component -->
                        @php
                            $items = [
                                [
                                    'icon' => 'geo-alt-fill',
                                    'title' => 'Alamat',
                                    'desc' => "Jl. Contoh No. 123\nKota, Provinsi 12345",
                                ],
                                ['icon' => 'telephone-fill', 'title' => 'Telepon', 'desc' => '(021) 123-4567'],
                                ['icon' => 'envelope-fill', 'title' => 'Email', 'desc' => 'info@organisasi.com'],
                                [
                                    'icon' => 'clock-fill',
                                    'title' => 'Jam Kerja',
                                    'desc' => "Senin - Jumat: 08:00 - 17:00\nSabtu: 08:00 - 12:00\nMinggu: Tutup",
                                ],
                            ];
                        @endphp

                        @foreach ($items as $item)
                            <div class="flex items-start space-x-4">
                                <i class="bi bi-{{ $item['icon'] }} text-blue-600 text-2xl"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $item['title'] }}</h3>
                                    <p class="text-gray-600 whitespace-pre-line">{{ $item['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Social Icons -->
                    <div class="mt-10">
                        <h3 class="font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="hover:text-blue-700 text-blue-600 transition"><i
                                    class="bi bi-facebook text-2xl"></i></a>
                            <a href="#" class="hover:text-blue-500 text-blue-400 transition"><i
                                    class="bi bi-twitter text-2xl"></i></a>
                            <a href="#" class="hover:text-pink-700 text-pink-600 transition"><i
                                    class="bi bi-instagram text-2xl"></i></a>
                            <a href="#" class="hover:text-red-700 text-red-600 transition"><i
                                    class="bi bi-youtube text-2xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <section class="mt-10">
                <div class="bg-white shadow-lg border border-gray-100 rounded-xl p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Lokasi Kami</h2>

                    <div
                        class="aspect-video bg-gray-100 rounded-xl flex flex-col items-center justify-center text-gray-500">
                        <i class="bi bi-geo-alt text-5xl mb-3"></i>
                        <p>Map akan ditampilkan di sini</p>
                        <span class="text-sm mt-1">Koordinat: -6.2088, 106.8456</span>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
