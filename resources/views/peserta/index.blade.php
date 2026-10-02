@extends('layouts.app')
@section('title', 'Data Peserta')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Data Peserta Sertifikasi</h4>
        <a href="{{ route('peserta.create') }}" class="btn btn-primary btn-sm">+ Tambah Peserta</a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body p-2">
            <form action="{{ route('peserta.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control form-control-sm"
                    placeholder="Cari nama / NIK / skema..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-secondary btn-sm">Cari</button>
                @if ($search)
                    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>NIK</th>
                            <th>Nama Peserta</th>
                            <th>Skema</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th class="text-end pe-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesertas as $index => $item)
                            <tr>
                                <td class="ps-3">{{ $pesertas->firstItem() + $index }}</td>
                                <td><code>{{ $item->nik }}</code></td>
                                <td class="fw-medium">{{ $item->nama_peserta }}</td>
                                <td>{{ $item->skema->nm_skema ?? '-' }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status_rekomendasi == 'Kompeten' ? 'success' : 'danger' }}">
                                        {{ $item->status_rekomendasi }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('peserta.show', $item->id) }}"
                                        class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="{{ route('peserta.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('peserta.destroy', $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Data peserta tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $pesertas->links() }}</div>
@endsection