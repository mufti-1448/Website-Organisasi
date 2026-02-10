<footer class="bg-dark text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row gy-4">
            {{-- Kolom 1: Deskripsi --}}
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-people-fill text-primary fs-3 me-2"></i>
                    <h5 class="mb-0 fw-bold">Dewan Ambalan</h5>
                </div>
                <p class="text-light small mb-0">
                    Organisasi yang berkomitmen untuk mengembangkan potensi anggota dan berkontribusi positif bagi
                    masyarakat.
                </p>
            </div>

            {{-- Kolom 2: Kontak --}}
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <p class="mb-1"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>Jl. Pelita 1 Pekalongan
                    Selatan<br>Kota Pekalongan</p>
                <p class="mb-1"><i class="bi bi-envelope-fill me-2 text-primary"></i>info@dewanambalan.org</p>
                <p class="mb-0"><i class="bi bi-telephone-fill me-2 text-primary"></i>+62 82322862143</p>
            </div>

            {{-- Kolom 3: Media Sosial --}}
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Media Sosial</h6>
                <div class="d-flex gap-0 m">
                    <a href="#" class="btn text-danger btn-md"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn text-success btn-md"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="btn text-primary btn-md"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <p class="text-center text-secondary small mb-0">&copy; {{ date('Y') }} Dewan Ambalan. Semua hak cipta
            dilindungi.</p>
    </div>
</footer>
