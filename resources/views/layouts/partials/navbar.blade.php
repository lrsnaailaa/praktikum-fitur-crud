<nav class="navbar navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-book-half me-2"></i>Toko Buku
        </a>

        <div class="d-flex align-items-center gap-2">
            <div class="dropdown">
                <button class="btn btn-outline-light btn-sm dropdown-toggle"
                        type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ Auth::user()->name }}
                    <span class="badge bg-secondary ms-1">
                        {{ Auth::user()->level }}
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <button class="navbar-toggler d-lg-none" type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
