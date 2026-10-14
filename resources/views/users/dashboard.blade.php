<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta - USK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

    <!-- Navbar disamakan dengan Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Aplikasi Sertifikasi</a>

            <div class="d-flex align-items-center">
                <!-- Menampilkan nama user yang sedang login -->
                <span class="text-light me-3 small">
                    <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                </span>

                <!-- Tombol Logout gaya Admin -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-success shadow-sm p-4 rounded-4 mb-4">
                    <h4 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <p class="mb-0">Data pendaftaran Uji Kompetensi Keahlian Anda sudah tercatat di sistem dan
                        terintegrasi dengan data Admin.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <!-- Bagian Judul dan Status (Bersih & Rapi) -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold text-dark mb-0"><i class="fas fa-id-card me-2 text-primary"></i>Data Diri
                            Peserta</h4>
                        <span
                            class="badge bg-{{ $peserta->status_rekomendasi == 'Kompeten' ? 'success' : ($peserta->status_rekomendasi == 'Belum Kompeten' ? 'danger' : 'primary') }} fs-6 px-3 py-2">
                            Status: {{ $peserta->status_rekomendasi }}
                        </span>
                    </div>

                    <hr class="text-muted opacity-25">

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold">NIK</label>
                            <p class="fs-6 fw-semibold mb-2"><code>{{ $peserta->nik }}</code></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold">Nama Lengkap</label>
                            <p class="fs-6 fw-semibold mb-2">{{ $peserta->nama_peserta }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold">Jenis Kelamin</label>
                            <p class="fs-6 fw-semibold mb-2">
                                {{ $peserta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold">No. Handphone</label>
                            <p class="fs-6 fw-semibold mb-2">{{ $peserta->no_hp }}</p>
                        </div>
                        <div class="col-12">
                            <label class="text-muted small fw-bold">Alamat</label>
                            <p class="fs-6 fw-semibold mb-2">{{ $peserta->alamat }}</p>
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded-4 border mb-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="fas fa-certificate me-2 text-success"></i>Skema
                            Sertifikasi Pilihan</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="text-muted small d-block">Kode Skema</span>
                                <strong class="text-dark"><code>{{ $peserta->skema->kd_skema ?? '-' }}</code></strong>
                            </div>
                            <div class="col-md-8">
                                <span class="text-muted small d-block">Nama Skema</span>
                                <strong class="text-primary">{{ $peserta->skema->nm_skema ?? '-' }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('user.edit-profile') }}"
                            class="btn btn-outline-primary px-4 fw-semibold rounded-pill">
                            <i class="fas fa-edit me-1"></i> Edit Data Diri
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
