@extends('layouts.masterAdmin')
@section('titel', 'Jadwal Pesanan Edit')
@section('konten')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Jadwal Ambil
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('jadwalpesanan.update',$jadwalPesanan->id) }}">
            @csrf
            <!-- Input Tanggal Jadwal -->
            <div class="mb-3">
                <label for="tanggal_jadwal" class="form-label">Tanggal Ambil</label>
                <input 
                    type="date" 
                    class="form-control @error('tanggal_jadwal') is-invalid @enderror" 
                    id="tanggal_jadwal" 
                    name="tanggal_jadwal" 
                    value="{{ old('tanggal_jadwal', $jadwalPesanan->tanggal_jadwal ?? '') }}" 
                    required>
                @error('tanggal_jadwal')
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

    
@endsection