@extends('layouts.masterPelanggan')

@section('konten')
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 50%; min-width: 300px;">
        <div class="card-header bg-danger text-white text-center">
            <h4>Rincian Pesanan</h4>
        </div>
        <div class="card-body">
            <!-- DATA PELANGGAN -->
            <h5 class="text-danger">DATA PELANGGAN</h5>
            <p><strong>Nama Pemesan:</strong> {{$pesanan->user->name}}</p>
            <p><strong>Email Pemesan:</strong> {{$pesanan->user->email}}</p>
            <p><strong>Kontak Pemesan:</strong> {{$pesanan->user->kontak}}</p>

            <!-- DATA PESANAN -->
            <h5 class="text-danger mt-4">DATA PESANAN</h5>
            <p><strong>Kode Pesanan:</strong> {{$pesanan->kode_pesanan}}</p>
            <p><strong>Jenis Barang:</strong> {{$pesanan->jenis_barang->nama_barang}}</p>
            <p><strong>Merk Barang:</strong> {{$pesanan->merk_barang}}</p>
            <p><strong>Jenis Layanan:</strong> {{$pesanan->layanan->nama_layanan}}</p>

            <!-- DETAIL TANGGAL -->
            <h5 class="text-danger mt-4">DETAIL TANGGAL</h5>
            <p><strong>Tanggal Pesan:</strong> {{$pesanan->tanggal_pesanan}}</p>

            <!-- TOTAL HARGA -->
            <h5 class="text-danger mt-4">TOTAL HARGA</h5>
            <p><strong>Rp{{number_format($pesanan->total_biaya, 0, ',', '.')}}</strong></p>
            <div class="text-end">
                <a href="/" class="btn btn-danger text-decration-none text-white " >Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
