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
                    <form method="POST" action="{{ route('pembayaran.edit', $pembayaran->id_pembayaran) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">ID Pembayaran</label>
                                <input type="text" class="form-control" value="<?php echo date('Ydis'); ?>" readonly
                                    name="id_pembayaran">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIS</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        placeholder="Pilih NIS" readonly value={{ old('nis', $pembayaran->nis) }}>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" readonly
                                    value="{{ old('nama_siswa', $pembayaran->siswa->nama) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bulan Dibayar</label>
                                <select class="form-select" name="bulan_dibayar">
                                    <option value="">Pilih Bulan</option>
                                    @php
                                        $bulan = [
                                            'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember',
                                        ];
                                    @endphp
                                    @foreach ($bulan as $b)
                                        <option value="{{ $b }}"
                                            {{ old('bulan_dibayar', $pembayaran->bulan_dibayar) == $b ? 'selected' : '' }}>
                                            {{ $b }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Dibayar</label>
                                <select class="form-select" name="tahun_dibayar">
                                    <option value="">Pilih Tahun</option>
                                    @for ($year = now()->year; $year >= now()->year - 2; $year--)
                                        <option value="{{ $year }}"
                                            {{ old('tahun_dibayar', $pembayaran->tahun_dibayar) == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar"
                                    placeholder="Masukkan jumlah" readonly
                                    value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Keterangan</label>
                                <select class="form-select" name="keterangan">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="Lunas"
                                        {{ old('keterangan', $pembayaran->keterangan) == 'Lunas' ? 'selected' : '' }}>
                                        Lunas</option>
                                    <option value="Menunggak"
                                        {{ old('keterangan', $pembayaran->keterangan) == 'Menunggak' ? 'selected' : '' }}>
                                        Menunggak</option>
                                </select>
                            </div>
                        </div>
                        <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-secondary">Batal</a>
                        <input type="submit" class="btn btn-primary" value="Update Pembayaran">
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
                    <input type="text" id="searchInput" class="form-control mb-3"
                        placeholder="Cari NIS atau Nama Siswa">

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
