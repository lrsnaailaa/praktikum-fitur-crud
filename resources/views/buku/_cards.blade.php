<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">

    @forelse ($data_buku as $buku)

        <div class="col">
            <div class="card h-100 shadow-sm">

                @if ($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}"
                         class="card-img-top"
                         alt="Cover {{ $buku->judul }}"
                         style="height: 220px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center"
                         style="height: 220px;">
                        <i class="bi bi-book fs-1 text-secondary"></i>
                    </div>
                @endif

                <div class="card-body">

                    <span class="badge {{ $buku->jenis_buku == 'Fiksi' ? 'bg-primary' : 'bg-success' }}">
                        {{ $buku->jenis_buku }}
                    </span>

                    <h5 class="card-title fs-6 mt-2">
                        {{ $buku->judul }}
                    </h5>

                    <p class="card-text small text-muted mb-1">
                        <i class="bi bi-person me-1"></i>
                        {{ $buku->penulis }}
                    </p>

                    <p class="card-text small text-muted mb-2">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}
                    </p>

                    <p class="fw-bold mb-0">
                        Rp {{ number_format($buku->harga, 0, ',', '.') }}
                    </p>

                </div>

                <div class="card-footer bg-white border-0 pb-3 d-flex gap-1">

                    <a href="{{ route('buku.edit', $buku->id) }}"
                       class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    <form action="{{ route('buku.destroy', $buku->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </button>

                    </form>

                </div>

            </div>
        </div>

    @empty

        <div class="col-12 text-center text-muted">
            Belum ada data buku.
        </div>

    @endforelse

</div>
