@extends('layouts.masterAdmin')
@section('titel', 'Laporan Keuangan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Laporan Keuangan
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('laporanKeuangan.update', $laporanKeuangan->id) }}">
            @csrf
            <!-- Input Total Pemasukan -->
            <div class="mb-3">
                <label for="total_pemasukan" class="form-label">Total Pemasukan</label>
                <input 
                    type="text" 
                    class="form-control @error('total_pemasukan') is-invalid @enderror" 
                    id="total_pemasukan" 
                    name="total_pemasukan" 
                    value="{{ old('total_pemasukan', $laporanKeuangan->total_pemasukan ?? '') }}" 
                    required>
                @error('total_pemasukan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Simpan Perubahan
            </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Aksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    yakin ingin menyimpan perubahan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
