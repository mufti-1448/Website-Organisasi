@extends('user.layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Kontak Kami</h1>
            <p class="text-lg text-gray-600">Hubungi kami untuk informasi lebih lanjut atau pertanyaan</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Informasi Kontak</h2>

                <div class="space-y-4">
                    <!-- Address -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Alamat</h3>
                            <p class="text-gray-600">Jl. Contoh No. 123<br>Kota, Provinsi 12345</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-telephone-fill text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Telepon</h3>
                            <p class="text-gray-600">(021) 123-4567</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-envelope-fill text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-600">info@organisasi.com</p>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-clock-fill text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Jam Kerja</h3>
                            <p class="text-gray-600">
