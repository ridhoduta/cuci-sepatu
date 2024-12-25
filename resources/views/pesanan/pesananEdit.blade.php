@extends('layouts.masterAdmin')
@section('title', 'Edit Pesanan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Pesanan dari: {{ $pesanan->user->name ?? 'Pelanggan Tidak Diketahui' }}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pesanan.update' , $pesanan->kode_pesanan) }}" method="POST">
            @csrf
            <!-- Input Jenis Barang-->
            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Layanan</label>
                <select name="jenisBarang_id" id="layanan" class="form-control" required>
                    @foreach ($jenis_barang as $jb)
                    <option value="{{ $jb->id }}" {{ $pesanan->JenisBarang_id == $jb->id ? 'selected' : '' }}>{{ $jb->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Layanan -->
            <div class="mb-3">
                <label for="layanan" class="form-label">Layanan</label>
                <select name="layanan_id" id="layanan" class="form-control" required>
                    @foreach ($layanan as $l)
                    <option value="{{ $l->id }}" {{ $pesanan->layanan_id == $l->id ? 'selected' : '' }}>{{ $l->nama_layanan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Tanggal Pesanan -->
            <div class="mb-3">
                <label for="tanggalPesanan" class="form-label">Tanggal Pesanan</label>
                <input type="timestamp" name="tanggal_pesanan" class="form-control" id="tanggalPesanan"
                       value="{{ $pesanan->tanggal_pesanan ?? '' }}" readonly>
            </div>

            <!-- Input Status Pesanan -->
            <div class="mb-3">
                <label for="statusPesanan" class="form-label">Status Pesanan</label>
                <select name="status_pesanan" id="statusPesanan" class="form-control" required>
                    <option value="Dibatalkan" {{ $pesanan->status_pesanan == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    <option value="Diproses" {{ $pesanan->status_pesanan == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai" {{ $pesanan->status_pesanan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
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
            </div>
            
        </form>
    </div>
</div>

@endsection