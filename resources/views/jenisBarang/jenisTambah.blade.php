@extends('layouts.masterAdmin')
@section('titel', 'Jenis Barang Edit')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
           Tambah Jenis Barang
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('jenisBarang.tambah') }}">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input 
                    type="text" 
                    class="form-control @error('nama_barang') is-invalid @enderror" 
                    id="nama_barang" 
                    name="nama_barang" 
                    required>
                @error('nama_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input 
                    type="number" 
                    class="form-control @error('harga_barang') is-invalid @enderror" 
                    id="harga_barang" 
                    name="harga_barang" 
                    required>
                @error('harga_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Simpan
            </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Aksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    yakin ingin menyimpan?
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
