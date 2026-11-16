@extends('master')

@section('title', 'Gallery Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h3 mb-0">Gallery Buku</h2>

        <a href="{{ route('gallery.create') }}"
           class="btn btn-primary">
            Tambah Gambar
        </a>
    </div>

    {{-- Pesan keberhasilan --}}
    @if(session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="row">
        @forelse ($galleries as $gallery)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="{{ asset('storage/' . $gallery->picture) }}"
                       data-lightbox="gallery"
                       data-title="{{ $gallery->description }}">
                        <img src="{{ asset('storage/' . $gallery->picture) }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;"
                             alt="{{ $gallery->title }}">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $gallery->title }}
                        </h5>

                        <p class="text-muted small">
                            {{ $gallery->buku->judul }}
                        </p>

                        <p class="card-text">
                            {{ $gallery->description }}
                        </p>
                    </div>

                    <div class="card-footer bg-white">
                        <a href="{{ route('gallery.edit', $gallery->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('gallery.destroy', $gallery->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada gambar pada Gallery.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
@endsection
