<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Diri - USK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Aplikasi Sertifikasi</a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3 small">
                    <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <h3 class="fw-bold mb-2 text-center"><i class="fas fa-user-edit me-2 text-primary"></i>Edit Data
                        Diri</h3>
                    <p class="text-muted text-center small mb-4">Silakan perbarui informasi data diri dan skema Anda.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" maxlength="16"
                                value="{{ old('nik', $peserta->nik) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_peserta" class="form-control"
                                value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Skema Sertifikasi</label>
                            <select name="skema_id" class="form-select" required>
                                <option value="">-- Pilih Skema --</option>
                                @foreach ($skemas as $skema)
                                    <option value="{{ $skema->id }}"
                                        {{ $peserta->skema_id == $skema->id ? 'selected' : '' }}>
                                        {{ $skema->nm_skema }} ({{ $skema->kd_skema }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="L" {{ $peserta->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P" {{ $peserta->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $peserta->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">No. HP / WhatsApp</label>
                            <input type="text" name="no_hp" class="form-control"
                                value="{{ old('no_hp', $peserta->no_hp) }}" required>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Simpan Perubahan</button>
                            <a href="{{ route('users.dashboard') }}"
                                class="btn btn-secondary w-100 py-2 fw-bold">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
