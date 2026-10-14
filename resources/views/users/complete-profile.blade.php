<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Diri - USK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <h3 class="fw-bold mb-2 text-center">Formulir Pendaftaran Peserta</h3>
                    <p class="text-muted text-center small mb-4">Silakan lengkapi data diri dan pilih skema sertifikasi
                        Anda.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.store-profile') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" maxlength="16" required
                                placeholder="Contoh: 3502045512030001">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_peserta" class="form-control"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Skema Sertifikasi</label>
                            <select name="skema_id" class="form-select" required>
                                <option value="">-- Pilih Skema --</option>
                                @foreach ($skemas as $skema)
                                    <option value="{{ $skema->id }}">{{ $skema->nm_skema }} ({{ $skema->kd_skema }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" required placeholder="Masukkan alamat domisili"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">No. HP / WhatsApp</label>
                            <input type="text" name="no_hp" class="form-control" required
                                placeholder="Contoh: 081234567890">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Simpan & Masuk ke
                            Dashboard</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
