@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
    <h4 class="mb-3">Detail Peserta Sertifikasi</h4>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-borderless align-middle mb-0">
                <tbody>
                    <tr>
                        <th width="200">NIK</th>
                        <td>: <code>{{ $peserta->nik }}</code></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: {{ $peserta->nama_peserta }}</td>
                    </tr>
                    <tr>
                        <th>Skema Sertifikasi</th>
                        <td>: {{ $peserta->skema->nm_skema ?? '-' }} ({{ $peserta->skema->kd_skema ?? '-' }})</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $peserta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $peserta->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $peserta->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Status Rekomendasi</th>
                        <td>:
                            <span class="badge bg-{{ $peserta->status_rekomendasi == 'Kompeten' ? 'success' : 'danger' }}">
                                {{ $peserta->status_rekomendasi }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary btn-sm mt-3">Kembali</a>
        </div>
    </div>
@endsection