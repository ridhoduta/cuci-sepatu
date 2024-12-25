@extends('layouts.masterAdmin')
@section('titel', 'layanan Edit')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Layanan {{$layanan->nama_layanan}}
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('layanan.update', $layanan->id) }}">
            @csrf
            <!-- Input Nama Layanan -->
            <div class="mb-3">
                <label for="nama_layanan" class="form-label">Nama Layanan</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_layanan" 
                    name="nama_layanan" 
                    value="{{ old('nama_layanan', $layanan->nama_layanan) }}" 
                    required>
            </div>
        
            <!-- Input Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea 
                    class="form-control" 
                    id="deskripsi" 
                    name="deskripsi" 
                    rows="4" 
                    required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="hari" class="form-label">hari</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="hari" 
                    name="hari" 
                    value="{{ old('hari', $layanan->hari) }}" 
                    required>
            </div>
        
            <!-- Input Harga -->
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="harga" 
                    name="harga" 
                    value="{{ old('harga', $layanan->harga) }}" 
                    required>
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