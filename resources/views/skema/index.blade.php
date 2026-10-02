@extends('layouts.app')
@section('title', 'Data Skema')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Data Skema Sertifikasi</h4>
        <a href="{{ route('skema.create') }}" class="btn btn-primary btn-sm">+ Tambah Skema</a>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Jenis</th>
                        <th>Jumlah Unit</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $index => $item)
                        <tr>
                            <td class="ps-3">{{ $loop->iteration }}</td>
                            <td><code>{{ $item->kd_skema }}</code></td>
                            <td class="fw-medium">{{ $item->nm_skema }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->jumlah_unit }} Unit</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('skema.show', $item->id) }}"
                                    class="btn btn-info btn-sm text-white">Detail</a>
                                <a href="{{ route('skema.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('skema.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus skema ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Data skema belum ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
