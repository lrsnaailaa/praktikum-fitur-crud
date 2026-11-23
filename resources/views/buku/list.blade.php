@extends('master')

@section('title', 'Daftar Buku')

@section('content')
<section class="py-4">
    <div class="container">
        <h2 class="mb-4 text-center">Daftar Buku</h2>

        <div class="row">
            @forelse ($bukus as $buku)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center shadow-sm">

                        <a href="{{ route('galeri.buku', ['title' => $buku->buku_seo]) }}">
                            @if ($buku->cover)
                                <img src="{{ asset('storage/' . $buku->cover) }}"
                                     class="card-img-top"
                                     style="height: 220px; object-fit: cover;"
                                     alt="{{ $buku->judul }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="height: 220px;">
                                    <i class="bi bi-book fs-1 text-secondary"></i>
                                </div>
                            @endif
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('galeri.buku', ['title' => $buku->buku_seo]) }}"
                                   class="text-decoration-none text-dark">
                                    {{ $buku->judul }}
                                </a>
                            </h5>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    Belum ada data buku.
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $bukus->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
