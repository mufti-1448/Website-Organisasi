# 🌐 Website Organisasi Sekolah

Proyek ini adalah tugas **Ujian Kompetensi Keahlian (UKK)** untuk jurusan **Rekayasa Perangkat Lunak (RPL)**.  
Website ini dibangun menggunakan **Laravel, SQLite, Bootstrap, HTML, CSS, dan JavaScript**.

---

## 📌 Fitur Utama
- 🔑 Login & Autentikasi (Admin/User)
- 👥 CRUD Anggota Organisasi
- 📅 CRUD Rapat
- 📌 CRUD Program Kerja
- 📝 CRUD Notulen (terhubung dengan Rapat)
- ✅ CRUD Evaluasi (terhubung dengan Program Kerja)
- 📊 Laporan (Export PDF/Excel)
- 🎨 Tampilan responsif dengan Bootstrap

---

## 🛠️ Tech Stack
- [Laravel](https://laravel.com/) – Backend Framework
- [SQLite](https://www.sqlite.org/) – Database
- [Bootstrap](https://getbootstrap.com/) – Frontend Framework
- HTML, CSS, JavaScript

---

## 🚀 Cara Instalasi & Menjalankan

### 1. Clone Repository
```bash
git clone https://github.com/mufti-1448/Website-Organisasi.git
cd Website-Organisasi
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run dev   # opsional, jika pakai npm untuk bootstrap
```

### 3. Setup Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Ubah konfigurasi database di `.env` agar menggunakan SQLite:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Buat file kosong untuk database:
```bash
touch database/database.sqlite
```

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Migrasi Database
```bash
php artisan migrate
```

### 6. Jalankan Server
```bash
php artisan serve
```

Akses website di:  
👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 👨‍💻 Pengembang
Dibuat oleh **M. Khafidhin Mufti Ali**  
Jurusan **Rekayasa Perangkat Lunak (RPL)**  
Sebagai tugas **Ujian Kompetensi Keahlian (UKK)** Tahun 2025-2026.
