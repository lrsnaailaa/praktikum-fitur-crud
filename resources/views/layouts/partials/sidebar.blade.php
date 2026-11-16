<div class="sidebar col-lg-2 p-0 bg-dark">
    <div class="offcanvas-lg offcanvas-start bg-dark text-white"
         tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white"
                    data-bs-dismiss="offcanvas"
                    data-bs-target="#sidebarMenu"
                    aria-label="Tutup"></button>
        </div>

        <div class="offcanvas-body p-3">
            <ul class="nav nav-pills flex-column gap-1 w-100">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('buku.index', 'buku.search', 'buku.edit') ? 'active' : '' }}"
                       href="{{ route('buku.index') }}">
                        <i class="bi bi-journal-text me-2"></i>Data Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('buku.create') ? 'active' : '' }}"
                       href="{{ route('buku.create') }}">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Buku
                    </a>
                </li>

                <!-- MENU GALLERY -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"
                       href="{{ route('gallery.index') }}">
                        <i class="bi bi-images me-2"></i>Gallery
                    </a>
                </li>

                @if (Auth::check() && Auth::user()->level == 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
                           href="{{ url('/users') }}">
                            <i class="bi bi-people me-2"></i>Data Users
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
