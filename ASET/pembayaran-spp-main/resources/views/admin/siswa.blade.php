<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <div class="card shadow">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                    <a href="{{ route('siswa.tambah') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Siswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">NISN</th>
                                    <th style="text-align: center;">NIS</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Kelas</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($siswa as $s)
                                    <tr>
                                        <td style="text-align: center; width: 60px;">{{ $s->id }}</td>
                                        <td style="text-align: center; width: 100px;">{{ $s->nisn }}</td>
                                        <td style="text-align: center; width: 100px;">{{ $s->nis }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td style="text-align: center; width: 100px;">{{ $s->kelas->nama_kelas }}</td>
                                        <td style="text-align: center; width: 157px;">
                                            <button
                                                class="btn btn-warning btn-sm me-1 btn-detail"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailSiswaModal"
                                                data-nisn="{{ $s->nisn }}"
                                                data-nis="{{ $s->nis }}"
                                                data-nama="{{ $s->nama }}"
                                                data-kelas="{{ $s->kelas->nama_kelas ?? '-' }}"
                                                data-alamat="{{ $s->alamat }}"
                                                data-no_telp="{{ $s->no_telp }}"
                                                data-spp="{{ $s->spp->tahun }} - {{ number_format($s->spp->nominal, 0, ',', '.') }}"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('siswa.delete', $s->nisn) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailSiswaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr><th>NISN</th><td id="nisn"></td></tr>
                            <tr><th>NIS</th><td id="nis"></td></tr>
                            <tr><th>Nama</th><td id="nama"></td></tr>
                            <tr><th>Kelas</th><td id="kelas"></td></tr>
                            <tr><th>Alamat</th><td id="alamat"></td></tr>
                            <tr><th>No. Telepon</th><td id="no_telp"></td></tr>
                            <tr><th>SPP</th><td id="spp"></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
