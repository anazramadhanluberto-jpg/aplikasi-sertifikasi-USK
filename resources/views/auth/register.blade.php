<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Registrasi - Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <!-- Header dengan Tombol Kembali yang Rapi -->
                        <div class="d-flex align-items-center mb-4">
                            <a href="{{ url('/') }}"
                                class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 36px; height: 36px;" title="Kembali ke Beranda">
                                &larr;
                            </a>
                            <h5 class="card-title mb-0 fw-bold">Daftar Akun Baru</h5>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger py-2">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Daftar / Sign Up</button>
                        </form>

                        <div class="mt-3 text-center text-muted" style="font-size: 0.9rem;">
                            Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-decoration-none fw-medium">Login di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
