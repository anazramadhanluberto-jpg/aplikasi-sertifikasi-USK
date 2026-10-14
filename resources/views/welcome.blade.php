<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Aplikasi Sertifikasi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .main-card {
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            height: 100%;
            min-height: 480px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            text-align: center;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 py-4">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card main-card border-0 bg-white">
                    <div class="row g-0 align-items-stretch">

                        <!-- Kolom Kiri: Teks Sambutan & Tombol -->
                        <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                            <div class="mb-2">
                                <span
                                    class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-3">
                                    Sistem Sertifikasi RPL
                                </span>
                                <h1 class="fw-bold display-6 text-dark mb-2">Halo,<br>Selamat Datang</h1>
                                <p class="text-muted small">Silakan pilih menu di bawah untuk masuk ke sistem atau
                                    mendaftarkan akun baru.</p>
                            </div>

                            <div class="d-grid gap-3">
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary py-3 fw-semibold shadow-sm rounded-3">
                                    Login / Masuk
                                </a>
                                <a href="{{ route('register') }}"
                                    class="btn btn-outline-secondary py-3 fw-semibold rounded-3">
                                    Registrasi Akun Baru
                                </a>
                            </div>

                            <div class="mt-4 text-muted" style="font-size: 0.8rem;">
                                &copy; {{ date('Y') }} Aplikasi Sertifikasi Kompetensi Siswa
                            </div>
                        </div>

                        <!-- Kolom Kanan: Banner Gradasi Ungu (Full sampai atas & bawah) -->
                        <div class="col-md-6 d-none d-md-flex">
                            <div class="hero-section w-100 position-relative">
                                <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25"
                                    style="background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(0,0,0,0) 70%);">
                                </div>
                                <div class="position-relative z-index-1">
                                    <div class="mb-3">
                                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="text-white">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="fw-bold mb-2">Uji Sertifikasi Kompetensi</h3>
                                    <p class="small text-white-50 px-4">Platform pengelolaan data peserta dan skema
                                        sertifikasi berbasis web yang cepat dan terstruktur.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
