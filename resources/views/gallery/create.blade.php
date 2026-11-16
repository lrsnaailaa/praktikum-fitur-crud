@extends('master')

@section('title', 'Tambah Gambar Gallery')

@section('content')
    <h2 class="h3 mb-3">Tambah Gambar Gallery</h2>

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

            <form action="{{ route('gallery.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Gambar</label>
                    <input type="text" name="title"
                           class="form-control"
                           value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Buku</label>
                    <select name="buku_id" class="form-select" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id }}"
                                {{ old('buku_id') == $buku->id ? 'selected' : '' }}>
                                {{ $buku->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">File Gambar</label>
                    <input type="file" name="picture"
                           class="form-control"
                           accept=".jpg,.jpeg,.png" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('gallery.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection