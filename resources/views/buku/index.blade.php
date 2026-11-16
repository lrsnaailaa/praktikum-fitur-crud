@extends('master')

@section('title', 'Data Buku')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h3 mb-0">Data Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Buku
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('buku.search') }}" method="GET"
                  class="row justify-content-end mb-3">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="input-group">
                        <input type="text" name="kata" class="form-control"
                               placeholder="Cari judul atau penulis..."
                               value="{{ request('kata') }}">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @include('buku._cards')

            <div class="d-flex justify-content-center mt-3">
                {{ $data_buku->links('pagination::bootstrap-5') }}
            </div>

            <div class="mt-2">
                <strong>Jumlah Buku: {{ $jumlah_buku }}</strong>
            </div>
        </div>
    </div>
@endsection
