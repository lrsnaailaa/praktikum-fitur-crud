@extends('master')

@section('title', 'Tambah Buku')

@section('content')
    <h2 class="h3 mb-3">Tambah Buku</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('buku.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input id="judul" type="text" name="judul"
                           class="form-control" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input id="penulis" type="text" name="penulis"
                           class="form-control" value="{{ old('penulis') }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_buku" class="form-label">Jenis Buku</label>
                    <select id="jenis_buku" name="jenis_buku"
                            class="form-select" required>
                        <option value="">-- Pilih Jenis Buku --</option>
                        <option value="Fiksi"
                            {{ old('jenis_buku') == 'Fiksi' ? 'selected' : '' }}>
                            Fiksi
                        </option>
                        <option value="Non-Fiksi"
                            {{ old('jenis_buku') == 'Non-Fiksi' ? 'selected' : '' }}>
                            Non-Fiksi
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input id="harga" type="number" name="harga"
                           class="form-control" value="{{ old('harga') }}"
                           min="0" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                    <input id="tgl_terbit" type="text" name="tgl_terbit"
                           class="date form-control" placeholder="yyyy/mm/dd"
                           value="{{ old('tgl_terbit') }}" required>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Buku</label>
                    <input id="cover"
                           type="file"
                           name="cover"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">

                    <div class="form-text">
                        Format JPG/PNG, maksimal 2 MB (opsional).
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection