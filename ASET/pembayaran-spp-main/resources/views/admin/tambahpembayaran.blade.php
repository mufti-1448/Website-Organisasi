<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="h3 mb-4">Tambah Pembayaran SPP</h1>

            <div class="card shadow">
                <div class="card-body">
                    <form method="post" action="{{ route('pembayaran.store') }}">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">ID Pembayaran</label>
                                <input type="text" class="form-control" value="<?php echo date('Ydis'); ?>" readonly name="id_pembayaran">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIS</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        placeholder="Pilih NIS" readonly>
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalCariSiswa">
                                        Cari
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bulan Dibayar</label>
                                <select class="form-select" name="bulan_dibayar">
                                    <option value="">Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Dibayar</label>
                                <select class="form-select" name="tahun_dibayar">
                                    <option value="">Pilih Tahun</option>
                                    @for ($year = now()->year; $year >= now()->year - 2; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Masukkan jumlah" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Keterangan</label>
                                <select class="form-select" name="keterangan">
                                    <option value="">Pilih Keterangan</option>>
                                    <option value="Lunas">Lunas</option>>
                                    <option value="Menunggak">Menunggak</option>>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Proses Pembayaran">
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Kelas Page -->
    </div>

    <!-- Modal Cari Siswa -->
    <div class="modal fade" id="modalCariSiswa" tabindex="-1" aria-labelledby="modalCariSiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari NIS atau Nama Siswa">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="siswaTableBody">
                            <!-- Data dari AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
