@extends('master')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h2 class="h3 mb-1">Dashboard</h2>
            <p class="text-muted mb-0">
                Selamat datang, {{ Auth::user()->name }}!
            </p>
        </div>

        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Buku
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="fs-1 text-primary me-3">
                        <i class="bi bi-journal-bookmark"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Jumlah Buku</div>
                        <div class="fs-3 fw-bold">{{ $jumlah_buku }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="fs-1 text-success me-3">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Harga Seluruh Buku</div>
                        <div class="fs-3 fw-bold">
                            Rp {{ number_format($total_harga, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Buku Terbaru</div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku_terbaru as $buku)
                        <tr>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
