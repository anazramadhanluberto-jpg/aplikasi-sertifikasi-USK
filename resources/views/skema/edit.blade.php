@extends('layouts.app')
@section('title', 'Ubah Skema')
@section('content')
    <h4 class="mb-3">
        Ubah Skema Sertifikasi</h4>
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
            <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3"><label class="form-label">Kode Skema</label><input type="text" name="kd_skema"
                        class="form-control" value="{{ old('kd_skema', $skema->kd_skema) }}" required></div>
                <div class="mb-3"><label class="form-label">Nama Skema</label><input type="text" name="nm_skema"
                        class="form-control" value="{{ old('nm_skema', $skema->nm_skema) }}" required></div>
                <div class="mb-3"><label class="form-label">Jenis Skema</label><input type="text" name="jenis"
                        class="form-control" value="{{ old('jenis', $skema->jenis) }}" required></div>
                <div class="mb-3"><label class="form-label">Jumlah Unit</label><input type="number" name="jumlah_unit"
                        class="form-control" value="{{ old('jumlah_unit', $skema->jumlah_unit) }}" required min="1">
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
