@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <h4 class="mb-4">Dashboard Administrator</h4>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3">
                <div class="card-body">
                    <h6 class="text-muted fw-normal">Total Peserta Sertifikasi</h6>
                    <h2 class="fw-bold mb-0">{{ $totalPeserta }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3">
                <div class="card-body">
                    <h6 class="text-muted fw-normal">Total Skema Sertifikasi</h6>
                    <h2 class="fw-bold mb-0">{{ $totalSkema }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white font-weight-bold py-3">
            <h5 class="mb-0 font-weight-bold">Daftar Peserta Sertifikasi</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Skema Sertifikasi</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th>No. HP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $index => $peserta)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td><code>{{ $peserta->nik }}</code></td>
                            <td class="fw-bold">{{ $peserta->nama_peserta ?? $peserta->nama }}</td>
                            <td>{{ $peserta->skema->nm_skema ?? ($peserta->skema->nama_skema ?? '-') }}</td>
                            <td class="text-center">{{ $peserta->jenis_kelamin }}</td>
                            <td>{{ $peserta->no_hp }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data peserta sertifikasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
