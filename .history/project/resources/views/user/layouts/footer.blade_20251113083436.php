<footer class="bg-dark text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row gy-4">
            {{-- Kolom 1 --}}
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
            {{-- Kolom 2 --}}
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <p class="mb-1"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>Jl. Pelita 1 No. 233, Peaklongan
                    Selatan<br>Pekalongan</p>
                <p class="mb-1"><i class="bi bi-envelope-fill me-2 text-primary"></i>info@dewanambalan.org</p>
                <p class="mb-0"><i class="bi bi-telephone-fill me-2 text-primary"></i>+62 823 2286 2143</p>
            </div>

            {{-- Kolom 3 --}}
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Media Sosial</h6>
                <div class="d-flex gap-2">
                    @if (isset($sosialMedia['facebook']) && $sosialMedia['facebook']->aktif)
                        <a href="{{ $sosialMedia['facebook']->url }}" class="btn btn-primary btn-sm rounded-circle"
                            target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif
                    @if (isset($sosialMedia['instagram']) && $sosialMedia['instagram']->aktif)
                        <a href="{{ $sosialMedia['instagram']->url }}" class="btn btn-success btn-sm rounded-circle"
                            target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif
                    @if (isset($sosialMedia['whatsapp']) && $sosialMedia['whatsapp']->aktif)
                        <a href="{{ $sosialMedia['whatsapp']->url }}" class="btn btn-primary btn-sm rounded-circle"
                            target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    @endif
                    @if (isset($sosialMedia['tiktok']) && $sosialMedia['tiktok']->aktif)
                        <a href="{{ $sosialMedia['tiktok']->url }}" class="btn btn-success btn-sm rounded-circle"
                            target="_blank">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    @endif
                </div>
            </div>

            <hr class="border-secondary mt-4">

            <p class="text-center text-secondary small mb-0 mt-0">&copy; {{ date('Y') }} Dewan Ambalan. Semua hak
                cipta
                dilindungi.</p>
        </div>
    </div>
</footer>
