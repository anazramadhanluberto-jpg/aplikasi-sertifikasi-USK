@extends('layouts.app') {{-- Sesuaikan dengan layout Anda --}}

@section('content')
    <div class="container mx-auto p-6">
        <div class="mb-7 flex justify-between items-center">
            <h2 class="text-2xl font-bold">{{ $skema->nama_skema }}</h2>
            <a href="{{ route('skema.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        </div>

        <div class="bg-white p-4 rounded shadow mb-4">
            <p><strong>Kode Skema:</strong> {{ $skema->kd_skema }}</p>
            <p><strong>Jenis:</strong> {{ $skema->jenis }}</p>
            <p><strong>Jumlah Unit:</strong> {{ $skema->jumlah_unit }} Unit</p>
            <p><strong>Total Peserta Terdaftar:</strong> {{ $skema->pesertas->count() }} Orang</p>
            <a href="{{ route('skema.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white font-weight-bold py-3">
                <h5 class="mb-0 font-weight-bold">Daftar Peserta Pada Skema Ini</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>NIK</th>
                            <th>Nama Peserta</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th>No. HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skema->pesertas as $index => $peserta)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><code>{{ $peserta->nik }}</code></td>
                                <td class="fw-bold">{{ $peserta->nama_peserta ?? $peserta->nama }}</td>
                                <td class="text-center">{{ $peserta->jenis_kelamin }}</td>
                                <td>{{ $peserta->no_hp }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada peserta yang mengambil
                                    skema ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
