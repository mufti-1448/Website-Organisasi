@extends('user.layouts.app')

@section('title', 'Kontak Kami')

@section('content')
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
                            ['icon' => 'geo-alt-fill', 'title' => 'Alamat', 'desc' => "Jl. Contoh No. 123\nKota, Provinsi 12345"],
                            ['icon' => 'telephone-fill', 'title' => 'Telepon', 'desc' => '(021) 123-4567'],
                            ['icon' => 'envelope-fill', 'title' => 'Email', 'desc' => 'info@organisasi.com'],
                            ['icon' => 'clock-fill', 'title' => 'Jam Kerja', 'desc' => "Senin - Jumat: 08:00 - 17:00\nSabtu: 08:00 - 12:00\nMinggu: Tutup"],
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
                        <a href="#" class="hover:text-blue-700 text-blue-600 transition"><i class="bi bi-facebook text-2xl"></i></a>
                        <a href="#" class="hover:text-blue-500 text-blue-400 transition"><i class="bi bi-twitter text-2xl"></i></a>
                        <a href="#" class="hover:text-pink-700 text-pink-600 transition"><i class="bi bi-instagram text-2xl"></i></a>
                        <a href="#" class="hover:text-red-700 text-red-600 transition"><i class="bi bi-youtube text-2xl"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <section class="mt-10">
            <div class="bg-white shadow-lg border border-gray-100 rounded-xl p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Lokasi Kami</h2>

                <div class="aspect-video bg-gray-100 rounded-xl flex flex-col items-center justify-center text-gray-500">
                    <i class="bi bi-geo-alt text-5xl mb-3"></i>
                    <p>Map akan ditampilkan di sini</p>
                    <span class="text-sm mt-1">Koordinat: -6.2088, 106.8456</span>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
