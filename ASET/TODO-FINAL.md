# 📝 TODO List - Proyek Website Organisasi Sekolah (FINAL VERSION)

Laravel + SQLite + Bootstrap + HTML + CSS + JS

---

## 🔹 Tahap 0 – Persiapan (0–10%)

- [✅] Pahami ketentuan UKK dan tema project (Website Organisasi Sekolah).
- [✅] Catat kriteria penilaian: Penguasaan materi, fungsionalitas, tampilan.
- [✅] Siapkan tools & environment:
  - [✅] Install PHP & Composer. (PHP 8.3.11) & (Composer version 2.8.9)
  - [✅] Install Laravel (versi stabil LTS).
  - [✅] Pastikan SQLite siap digunakan.
  - [✅] Siapkan text editor (VS Code).
  - [✅] Siapkan Git & GitHub repo (opsional).
- [✅] Buat folder kerja khusus proyek.

---

## 🔹 Tahap 1 – Perancangan Sistem (10–25%)

- [✅] Buat **Flowchart / DFD** alur sistem:
  - [✅] Login → Dashboard → CRUD Data (Anggota, Rapat, Program Kerja, Notulen, Evaluasi) → Laporan.
  - [✅] Diagram kontekstual (level 0) + DFD level 1 untuk tiap proses utama.

- [✅] Buat **ERD (Entity Relationship Diagram)** untuk database:
  - Hubungkan tabel dengan relasi (1–N atau N–N bila perlu).
  - Gunakan tools (dbdiagram.io, draw.io, Lucidchart, atau kertas).

- [✅] Tentukan tabel & atribut utama:
  - **Anggota**: id, nama, kelas, jabatan, kontak, foto
  - **Rapat**: id, judul, tanggal, tempat, status
  - **Program Kerja**: id, nama, deskripsi, penanggung jawab, status
  - **Notulen**: id, rapat_id (FK), isi, tanggal, penulis_id, program_id
  - **Evaluasi**: id, program_id (FK), catatan, status, tanggal
  - **Dokumentasi**: id, rapat_id, judul, deskripsi, foto, tanggal, kategori, program_id
  - **Kontak**: id, nama, email, pesan, tanggal, status

---

## 🔹 Tahap 2 – Setup Project (25–35%)

- [✅] Buat project Laravel baru (`laravel new osisweb`).
- [✅] Atur `.env` untuk SQLite database.
- [✅] Jalankan migrasi default Laravel (`php artisan migrate`).
- [✅] Tambahkan Bootstrap (via CDN / npm install).
- [✅] Uji apakah Laravel & Bootstrap berjalan.

---

## 🔹 Tahap 3 – Database & Model (35–50%)

- [✅] Buat migration & model untuk setiap tabel:
  - [✅] Anggota, Rapat, Program Kerja, Notulen, Evaluasi
- [✅] Definisikan relasi antar model (`hasMany`, `belongsTo`).
- [✅] Jalankan `php artisan migrate:fresh`.
- [✅] Cek database di SQLite Browser (opsional).
- [✅] Tambahkan Seeder untuk data dummy.

---

## 🔹 Tahap 4 – CRUD Implementasi (50–75%)

### Admin CRUD (All Complete)
- [✅] Anggota: Route, Controller, View (tabel + form Bootstrap).
- [✅] Rapat: Route, Controller, View (tabel + form Bootstrap).
- [✅] Program Kerja: Route, Controller, View (tabel + form Bootstrap).
- [✅] Notulen: Route, Controller, View (tabel + form Bootstrap).
- [✅] Evaluasi: Route, Controller, View (tabel + form Bootstrap).
- [✅] Dokumentasi: Route, Controller, View (tabel + form Bootstrap).
- [✅] Kontak: Route, Controller, View (tabel + form Bootstrap).

---

## 🔹 Tahap 5 – Autentikasi & Middleware (75–85%)

- [✅] Install Laravel Breeze (atau Jetstream/Laravel UI).
- [✅] Buat login page dengan Bootstrap styling.
- [✅] Tambahkan middleware `auth` untuk halaman CRUD.
- [✅] Tambahkan role sederhana (Admin/User) jika perlu.

---

## 🔹 Tahap 6 – UI/UX & Fitur Tambahan (85–95%)

### User Pages (All Complete)
- [✅] Halaman Depan (Beranda) - Hero, stats, programs
- [✅] Halaman Tentang Kami - Profile, vision, mission, values
- [✅] Halaman Anggota - Grid cards with photos
- [✅] Halaman Rapat - Meeting list with details
- [✅] Halaman Program Kerja - Program cards with status
- [✅] Halaman Notulen - Table with modal details
- [✅] Halaman Evaluasi - Evaluation cards with progress
- [✅] Halaman Dokumentasi - Photo gallery with lightbox
- [✅] Halaman Kontak - Contact form and info

### Additional Features
- [✅] Responsive design (Bootstrap grid system)
- [✅] Search & filter (Admin only)
- [✅] Pagination (Admin only)
- [✅] Export PDF/Excel (Admin only)
- [✅] File upload validation (All forms)

---

## 🔹 Tahap 7 – Testing & Dokumentasi (95–100%)

- [✅] Uji coba semua fitur CRUD.
- [✅] Uji relasi antar data (Notulen ↔ Rapat, Evaluasi ↔ Program Kerja).
- [✅] Fix bug kecil (UI/logic).
- [✅] Buat dokumentasi/manual book:
  - [✅] Cara install & run project.
  - [✅] Cara login & CRUD data.
  - [✅] Cara export laporan.
- [✅] Buat presentasi singkat (PowerPoint/Canva):
  - [✅] Penjelasan sistem.
  - [✅] ERD & Flowchart.
  - [✅] Screenshot tampilan.
- [✅] Latihan menjelaskan kode & konsep (untuk penguasaan materi).

---

## ✅ Hasil Akhir

- Website organisasi sekolah dengan fitur:
  - Login Admin/User
  - CRUD Anggota, Rapat, Program Kerja, Notulen, Evaluasi
  - Laporan (PDF/Excel)
  - UI Bootstrap yang responsif
- Dokumentasi & presentasi siap untuk UKK

## 📊 Status Progress: 100% COMPLETE ✅

**Yang sudah selesai:**
- ✅ Database & Models (100%)
- ✅ Authentication & Admin Login (100%)
- ✅ Admin Panel CRUD lengkap (100%)
- ✅ User Pages UI/UX lengkap (100%)
- ✅ Controller & Routes (100%)
- ✅ Responsive Design (100%)
- ✅ File Upload & Validation (100%)
- ✅ Testing & Bug Fixes (100%)
- ✅ Dokumentasi (100%)

**Yang belum selesai:** TIDAK ADA

---

## Catatan Teknis

### Praktik Ideal Menyimpan Foto
Simpan nama file atau path file di kolom foto. Contoh: foto = anggota_123.jpg

File fotonya di-upload ke storage/app/public/uploads/anggota

Gunakan `php artisan storage:link` untuk link storage ke public.

Tampilkan dengan: `<img src="{{ asset('storage/uploads/anggota/'.$anggota->foto) }}">`

### Alur Upload
1. User upload foto lewat form CRUD
2. File disimpan ke storage/public/uploads/[folder]
3. Kolom foto menyimpan nama file saja
4. Saat tampil, gunakan asset() helper

### Solusi & Saran
- Gunakan storage Laravel untuk file management
- Simpan path relatif di database
- Link storage dengan `php artisan storage:link`
- Handle error untuk file yang tidak ada
