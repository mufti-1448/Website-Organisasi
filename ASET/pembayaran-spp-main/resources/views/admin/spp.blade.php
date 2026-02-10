<x-app-layout>
    <div class="container-fluid p-4">
        <div id="sppPage" class="page">

            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar SPP</h6>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSppModal">
                        <i class="fas fa-plus me-2"></i>Tambah SPP
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">ID SPP</th>
                                    <th style="text-align: center;">Tahun</th>
                                    <th style="text-align: center;">Nominal (Rp.)</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($data as $d)
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{ $d->id_spp }}</td>
                                    <td>{{ $d->tahun }}</td>
                                    <td>{{ $d->nominal }}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-info btn-sm me-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
