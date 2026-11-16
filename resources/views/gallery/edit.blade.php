@extends('master')

@section('title', 'Edit Gambar Gallery')

@section('content')
    <h2 class="h3 mb-3">Edit Gambar Gallery</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('gallery.update', $gallery->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Gambar</label>
                    <input type="text" name="title"
                           class="form-control"
                           value="{{ old('title', $gallery->title) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Buku</label>
                    <select name="buku_id" class="form-select" required>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id }}"
                                {{ old('buku_id', $gallery->buku_id) == $buku->id ? 'selected' : '' }}>
                                {{ $buku->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description', $gallery->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $gallery->picture) }}"
                             width="150"
                             class="img-thumbnail"
                             alt="Gambar Gallery">
                    </div>

                    <input type="file" name="picture"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('gallery.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection