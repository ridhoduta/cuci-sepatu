@extends('layouts.masterAdmin')
@section('titel', 'layanan Edit')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Transaksi
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('transaksi.update', $transaksi->id) }}">
            @csrf
            <!-- Input Tanggal Transaksi -->
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="tanggal_transaksi" 
                    name="tanggal_transaksi" 
                    value="{{ old('tanggal_transaksi', \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('Y-m-d') ?? '') }}"  
                    readonly>
            </div>

            <!-- Input Jumlah Pembayaran -->
            <div class="mb-3">
                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="jumlah_pembayaran" 
                    name="jumlah_pembayaran" 
                    value="{{ old('jumlah_pembayaran', $transaksi->jumlah_pembayaran) }}" 
                    required>
            </div>

            <!-- Input Status Pembayaran -->
            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <select 
                    class="form-control" 
                    id="status_pembayaran" 
                    name="status_pembayaran" 
                    required>
                    <option value="Lunas" {{ old('status_pembayaran', $transaksi->status_pembayaran) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum Lunas" {{ old('status_pembayaran', $transaksi->status_pembayaran) == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>

            <!-- Tombol Submit -->
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
