@extends('master')

@section('title', 'Hasil Pencarian Buku')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h3 mb-0">Hasil Pencarian Buku</h2>

        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Data Buku
        </a>
    </div>

    @if ($data_buku->count() > 0)
        <div class="alert alert-success">
            Ditemukan <strong>{{ $jumlah_buku }}</strong> data dengan kata kunci:
            <strong>{{ $cari }}</strong>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Cover</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Tanggal Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_buku as $buku)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>
                                    @if ($buku->cover)
                                        <img src="{{ asset('storage/' . $buku->cover) }}"
                                             width="60"
                                             class="img-thumbnail"
                                             alt="Cover {{ $buku->judul }}">
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->jenis_buku }}</td>
                                <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $data_buku->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-warning">
            <h4 class="alert-heading">Data tidak ditemukan</h4>
            <p class="mb-0">
                Tidak ada data buku yang cocok dengan kata kunci
                <strong>{{ $cari }}</strong>.
            </p>
        </div>
    @endif
@endsection
