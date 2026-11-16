<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Toko Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #212529 0%, #0d6efd 100%);
        }

        .login-box {
            max-width: 420px;
            width: 100%;
        }
    </style>
</head>
<body>
    <main class="container py-4">
        <div class="login-box mx-auto">
            <div class="text-center text-white mb-4">
                <i class="bi bi-book-half display-4"></i>
                <h1 class="h3 mt-2">Toko Buku</h1>
                <p class="mb-0">Silakan masuk untuk melanjutkan</p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="email" type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="nama@contoh.com"
                                   required autofocus autocomplete="email">
                            <label for="email">Alamat Email</label>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="password" type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password"
                                   required autocomplete="current-password">
                            <label for="password">Password</label>

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>