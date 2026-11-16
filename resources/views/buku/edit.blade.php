@extends('master')

@section('title', 'Edit Buku')

@section('content')
    <h2 class="h3 mb-3">Edit Buku</h2>

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

            <form action="{{ route('buku.update', $buku->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input id="judul" type="text" name="judul"
                           class="form-control"
                           value="{{ old('judul', $buku->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input id="penulis" type="text" name="penulis"
                           class="form-control"
                           value="{{ old('penulis', $buku->penulis) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_buku" class="form-label">
                        Jenis Buku
                    </label>

                    <select id="jenis_buku"
                            name="jenis_buku"
                            class="form-select"
                            required>

                        <option value="Fiksi"
                            {{ old('jenis_buku', $buku->jenis_buku) == 'Fiksi' ? 'selected' : '' }}>
                            Fiksi
                        </option>

                        <option value="Non-Fiksi"
                            {{ old('jenis_buku', $buku->jenis_buku) == 'Non-Fiksi' ? 'selected' : '' }}>
                            Non-Fiksi
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input id="harga" type="number" name="harga"
                           class="form-control"
                           value="{{ old('harga', $buku->harga) }}"
                           min="0" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                    <input id="tgl_terbit" type="text" name="tgl_terbit"
                           class="date form-control" placeholder="yyyy/mm/dd"
                           value="{{ old('tgl_terbit', \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y/m/d')) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Buku</label>

                    @if ($buku->cover)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $buku->cover) }}"
                                 width="100"
                                 class="img-thumbnail"
                                 alt="Cover {{ $buku->judul }}">
                        </div>
                    @else
                        <p class="text-muted small">Belum ada cover buku.</p>
                    @endif

                    <input id="cover" type="file" name="cover"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti cover.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection
