@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3><i class="bi bi-pencil-square"></i> Edit Rapat</h3>

        <form action="{{ route('admin.rapat.update', $rapat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="rapatTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#detail" type="button">Detail
                        Rapat</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#notulen" type="button">Notulen</button>
                </li>


            </ul>

            <div class="tab-content mt-3">
                <!-- Detail Rapat -->
                <div class="tab-pane fade show active" id="detail">
                    <div class="mb-3">
                        <label class="form-label">ID Rapat</label>
                        <input type="text" class="form-control" value="{{ $rapat->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $rapat->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $rapat->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Waktu</label>
                        <input type="time" name="waktu" class="form-control" value="{{ $rapat->waktu }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{ $rapat->tempat }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="belum" {{ $rapat->status == 'belum' ? 'selected' : '' }}>Belum</option>
                            <option value="berlangsung" {{ $rapat->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung
                            </option>
                            <option value="selesai" {{ $rapat->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                </div>

                <!-- Notulen -->
                <div class="tab-pane fade" id="notulen">
                    <div class="mb-3">
                        <label class="form-label">Pilih Notulen</label>
                        <select name="notulen_id" class="form-select">
                            <option value="">-- Pilih Notulen --</option>
                            @foreach ($notulenList as $notulen)
                                <option value="{{ $notulen->id }}"
                                    {{ $rapat->notulen && $rapat->notulen->id == $notulen->id ? 'selected' : '' }}>
                                    {{ $notulen->judul }}
                                    ({{ \Carbon\Carbon::parse($notulen->tanggal)->format('d-m-Y') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>



            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Update</button>
            <a href="{{ route('admin.rapat.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
