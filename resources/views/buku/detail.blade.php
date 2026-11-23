@extends('master')

@section('title', 'Detail Buku')

@section('content')
    <h2 class="h3 mb-3">Detail Buku</h2>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    @if ($buku->cover)
                        <img src="{{ asset('storage/' . $buku->cover) }}"
                             class="img-fluid rounded"
                             alt="{{ $buku->judul }}">
                    @else
                        <p>Belum ada cover buku.</p>
                    @endif
                </div>

                <div class="col-md-9">
                    <h4>{{ $buku->judul }}</h4>
                    <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                    <p><strong>Jenis Buku:</strong> {{ $buku->jenis_buku }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($buku->harga, 0, ',', '.') }}</p>
                    <p><strong>Tanggal Terbit:</strong>
                        {{ $buku->tgl_terbit->format('d-m-Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Gallery Buku</h4>

    <div class="row">
        @forelse ($galeris as $galeri)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $galeri->picture) }}"
                         class="card-img-top"
                         alt="{{ $galeri->title }}"
                         style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $galeri->title }}
                        </h5>

                        <p class="card-text">
                            {{ $galeri->description }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada gambar Gallery untuk buku ini.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $galeris->links() }}
    </div>

    <a href="{{ route('buku.list') }}" class="btn btn-secondary mt-3">
        Kembali
    </a>
@endsection
