@extends('layouts.app')
@section('title', 'Tambah Peserta')
@section('content')
    <h4 class="mb-3">
        Tambah Data Peserta</h4>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger py-2 mb-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Skema Sertifikasi</label>
                    <select name="skema_id" class="form-select" required>
                        <option value="">-- Pilih Skema --</option>
                        @foreach ($skemas as $skema)
                            <option value="{{ $skema->id }}" {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                                {{ $skema->kd_skema }} - {{ $skema->nm_skema }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">NIK (16 DIGIT)</label>
                    <input type="text" name="nik" class="form-control neo-input" value="{{ old('nik') }}"
                        maxlength="16" required placeholder="Masukkan 16 digit NIK...">
                </div>
                <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" name="nama_peserta"
                        class="form-control" value="{{ old('nama_peserta') }}" required></div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label">No. HP</label><input type="text" name="no_hp"
                        class="form-control" value="{{ old('no_hp') }}" required></div>
                <div class="mb-3"><label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Rekomendasi</label>
                    <select name="status_rekomendasi" class="form-select" required>
                        <option value="Kompeten" {{ old('status_rekomendasi') == 'Kompeten' ? 'selected' : '' }}>Kompeten
                        </option>
                        <option value="Belum Kompeten"
                            {{ old('status_rekomendasi') == 'Belum Kompeten' ? 'selected' : '' }}>Belum Kompeten</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
