@extends('layouts.masterPelanggan')
@section('konten')
<style>

    .btn{
        background-color: #99201E;
        color: white;
    }
</style>
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Lacak Pesanan Anda
        </div>
        <div class="card-body">
            <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('pelangganLacak') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Masukkan Kode Pesanan Anda"
                    aria-label="Search" aria-describedby="basic-addon2" name="kode">
                <div class="input-group-append">
                    <button class="btn m-1" type="submit">
                        CARI
                    </button>
                </div>
            </div>
        </form>
    
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Jenis Barang</th>
                        <th>Layanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Ambil</th>
                        <th>Status Pesanan</th>
                        <th>Kode Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$pesanan)
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                    @else
                        <tr>
                            <td>{{ $pesanan->user->name }}</td>
                            <td>{{ $pesanan->jenis_barang->nama_barang }}</td>
                            <td>{{ $pesanan->layanan->nama_layanan }}</td>
                            <td>{{ $pesanan->tanggal_pesanan }}</td>
                            <td>{{ $jadwal->tanggal_jadwal }}</td>
                            <td>{{ $pesanan->status_pesanan }}</td>
                            <td>{{ $pesanan->kode_pesanan }}</td>
                        </tr>    
                    @endif
                </tbody>
            </table>
        </div>
    </div>    
</div>
@endsection