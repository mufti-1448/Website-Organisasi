# 📝 TODO List - Proyek Website Organisasi Sekolah
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
- [ ] Buat **Flowchart / DFD** alur sistem:
  - [ ] Login → Dashboard → CRUD Data → Laporan.
- [ ] Buat **ERD (Entity Relationship Diagram)** untuk database.
- [ ] Tentukan tabel & atribut utama:
  - [ ] Anggota (id, nama, kelas, jabatan, kontak, foto)
  - [ ] Rapat (id, judul, tanggal, tempat, keterangan)
  - [ ] Program Kerja (id, nama, deskripsi, penanggung jawab, status)
  - [ ] Notulen (id, rapat_id, isi, tanggal, penulis)
  - [ ] Evaluasi (id, program_id, catatan, status, tanggal)
- [ ] Buat desain UI/UX (wireframe di Figma/kertas):
  - [ ] Dashboard
  - [ ] CRUD Anggota
  - [ ] CRUD Rapat
  - [ ] CRUD Program Kerja
  - [ ] CRUD Notulen
  - [ ] CRUD Evaluasi
  - [ ] Login Page

---

## 🔹 Tahap 2 – Setup Project (25–35%)
- [ ] Buat project Laravel baru (`laravel new osisweb`).
- [ ] Atur `.env` untuk SQLite database.
- [ ] Jalankan migrasi default Laravel (`php artisan migrate`).
- [ ] Tambahkan Bootstrap (via CDN / npm install).
- [ ] Uji apakah Laravel & Bootstrap berjalan.

---

## 🔹 Tahap 3 – Database & Model (35–50%)
- [ ] Buat migration & model untuk setiap tabel:
  - [ ] Anggota
  - [ ] Rapat
  - [ ] Program Kerja
  - [ ] Notulen (relasi ke Rapat)
  - [ ] Evaluasi (relasi ke Program Kerja)
- [ ] Definisikan relasi antar model (`hasMany`, `belongsTo`).
- [ ] Jalankan `php artisan migrate:fresh`.
- [ ] Cek database di SQLite Browser (opsional).
- [ ] Tambahkan Seeder untuk data dummy (opsional).

---

## 🔹 Tahap 4 – CRUD Implementasi (50–75%)
### Anggota
- [ ] Route: index, create, store, edit, update, destroy.
- [ ] Controller: fungsi CRUD lengkap.
- [ ] View: tabel + form (Bootstrap).

### Rapat
- [ ] Route CRUD lengkap.
- [ ] Controller CRUD lengkap.
- [ ] View tabel + form.

### Program Kerja
- [ ] Route CRUD lengkap.
- [ ] Controller CRUD lengkap.
- [ ] View tabel + form.

### Notulen
- [ ] Route CRUD lengkap.
- [ ] Controller CRUD lengkap.
- [ ] View tabel + form.
- [ ] Pastikan terhubung dengan Rapat.

### Evaluasi
- [ ] Route CRUD lengkap.
- [ ] Controller CRUD lengkap.
- [ ] View tabel + form.
- [ ] Pastikan terhubung dengan Program Kerja.

---

## 🔹 Tahap 5 – Autentikasi & Middleware (75–85%)
- [ ] Install Laravel Breeze (atau Jetstream/Laravel UI).
- [ ] Buat login page dengan Bootstrap styling.
- [ ] Tambahkan middleware `auth` untuk halaman CRUD.
- [ ] Tambahkan role sederhana (Admin/User) jika perlu.

---

## 🔹 Tahap 6 – UI/UX & Fitur Tambahan (85–95%)
- [ ] Rapikan tampilan dengan Bootstrap:
  - [ ] Navbar, Footer, Sidebar (opsional).
  - [ ] Card & Table untuk data.
  - [ ] Form responsif.
- [ ] Tambahkan fitur search & filter data.
- [ ] Tambahkan pagination untuk tabel.
- [ ] Tambahkan fitur export PDF/Excel untuk laporan.
- [ ] Pastikan website responsif di HP/laptop.

---

## 🔹 Tahap 7 – Testing & Dokumentasi (95–100%)
- [ ] Uji coba semua fitur CRUD.
- [ ] Uji relasi antar data (Notulen ↔ Rapat, Evaluasi ↔ Program Kerja).
- [ ] Fix bug kecil (UI/logic).
- [ ] Buat dokumentasi/manual book:
  - [ ] Cara install & run project.
  - [ ] Cara login & CRUD data.
  - [ ] Cara export laporan.
- [ ] Buat presentasi singkat (PowerPoint/Canva):
  - [ ] Penjelasan sistem.
  - [ ] ERD & Flowchart.
  - [ ] Screenshot tampilan.
- [ ] Latihan menjelaskan kode & konsep (untuk penguasaan materi).

---

## ✅ Hasil Akhir
- Website organisasi sekolah dengan fitur:
  - Login Admin/User
  - CRUD Anggota, Rapat, Program Kerja, Notulen, Evaluasi
  - Laporan (PDF/Excel)
  - UI Bootstrap yang responsif
- Dokumentasi & presentasi siap untuk UKK
