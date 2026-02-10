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

- [✅] Buat **Flowchart / DFD** alur sistem:

  - [✅] Login → Dashboard → CRUD Data (Anggota, Rapat, Program Kerja, Notulen, Evaluasi) → Laporan.
  - [✅] Diagram kontekstual (level 0) + DFD level 1 untuk tiap proses utama.

- [✅] Buat **ERD (Entity Relationship Diagram)** untuk database:

  - Hubungkan tabel dengan relasi (1–N atau N–N bila perlu).
  - Gunakan tools (dbdiagram.io, draw.io, Lucidchart, atau kertas).

- [✅] Tentukan tabel & atribut utama:
  - **Anggota**
    - id, nama, kelas, jabatan, kontak, foto
  - **Rapat**
    - id, judul, tanggal, tempat, status
  - **Program Kerja**
    - id, nama, deskripsi, penanggung jawab, status
  - **Notulen**
    - id, rapat_id (FK), isi, tanggal, penulis_id, program_id
  - **Evaluasi**
    - id, program_id (FK), catatan, status, tanggal
  - **Dokumentasi**
    - id, rapat_id, judul, deskripsi, foto, tanggal, kategori, program_id
  - **Kontak**
    - id, nama, email, pesan, tanggal, status

## 📝 Struktur Halaman Web Organisasi

## 🔑 Halaman Admin

- [✅] Dashboard
  - [✅] Ringkasan data (anggota, rapat, program kerja, laporan)
- [✅] Halaman Anggota
  - [✅] Daftar anggota (CRUD)
  - [✅] Form tambah/edit/detail anggota
- [✅] Halaman Rapat
  - [✅] Daftar rapat (CRUD)
  - [✅] Form tambah/edit/detail rapat
- [✅] Halaman Program Kerja
  - [✅] Daftar program kerja (CRUD)
  - [✅] Form tambah/edit program kerja
- [✅] Halaman Notulen
  - [✅] Daftar notulen rapat (CRUD)
  - [✅] Form tambah/edit notulen
- [✅] Halaman Evaluasi
  - [✅] Daftar evaluasi program (CRUD)
  - [✅] Form tambah/edit evaluasi
- [✅] Halaman Dokumentasi
  - [✅] Upload galeri foto kegiatan
  - [✅] Kelola arsip kegiatan
- [✅] Halaman Kontak
  - [✅] Kelola pesan masuk dari form kontak
  - [✅] Kelola link media sosial

---

## 👥 Halaman User

- [] Halaman Depan
  - [] Profil organisasi singkat
- [] Halaman Tentang Kami
  - [] Sejarah singkat organisasi
  - [] Struktur organisasi + foto inti
  - [] Visi & misi
- [] Halaman Anggota
  - [] Daftar anggota (nama, kelas, jabatan, foto)
  - [] Detail anggota
- [] Halaman Rapat
  - [] Daftar rapat (judul, tanggal, tempat)
  - [] Detail rapat (info lengkap + notulen terkait)
- [] Halaman Program Kerja
  - [] Daftar program kerja (nama, deskripsi, status)
  - [] Detail program kerja
- [] Halaman Notulen
  - [] Daftar notulen rapat (judul rapat, tanggal, penulis)
  - [] Detail notulen (isi lengkap, unduh PDF opsional)
- [] Halaman Evaluasi
  - [] Daftar evaluasi program (program + status)
  - [] Detail evaluasi (catatan lengkap)
- [] Halaman Dokumentasi
  - [] Galeri foto kegiatan (grid)
  - [] Detail foto (lightbox) / kategori kegiatan
- [] Halaman Kontak
  - [] Form kontak sederhana (nama, email, pesan)
  - [] Link media sosial organisasi

📌 **Output Tahap 1**:
