<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Data Buku') | Toko Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">

    <!-- CSS LIGHTBOX -->
    <link rel="stylesheet"
          href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}">

    <style>
        .sidebar .nav-link {
            color: rgba(255, 255, 255, .75);
            border-radius: .375rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #0d6efd;
        }

        @media (min-width: 992px) {
            .sidebar {
                position: sticky;
                top: 56px;
                height: calc(100vh - 56px);
            }
        }
    </style>

    <!-- CSS TEMA PORTOFOLIO -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body>
    @include('layouts.partials.navbar')

    <!-- HERO PORTOFOLIO -->
    <section class="hero">
        <h1>Portofolio Saya</h1>
        <p>Koleksi buku dan galeri foto</p>
    </section>

    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.sidebar')

            <main class="col-12 col-lg-10 px-md-4 py-4">
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('pesan') }}

                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- FOOTER PORTOFOLIO -->
    <footer>
        &copy; {{ date('Y') }} Portofolio Saya
    </footer>

    <!-- JAVASCRIPT LIGHTBOX + JQUERY -->
    <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.date').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
</body>
</html>
