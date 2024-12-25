@extends('layouts.masterAdmin')
@section('title', 'Laporan Keuangan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <a href="{{route('laporanKeuangan.excel')}}" class="btn btn-success m-3">Export Excel</a>
                    <a href="{{ route('laporanKeuangan.expdf') }}" class="btn btn-success m-3" target="blank">Export PDF</a>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Total Pemasukan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporanKeuangan as $lk)
                    <tr>
                        <td>{{ $lk->transaksi->pesanan->kode_pesanan }}</td>
                        <td>{{ $lk->transaksi->tanggal_transaksi }}</td>
                        <td>Rp.{{ number_format($lk->total_pemasukan, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('laporanKeuangan.hapus' , $lk->id) }}" method="POST">
                                @csrf
                                   <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                       hapus
                                   </button>
                                   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                       <div class="modal-content">
                                       <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Aksi</h1>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                           yakin ingin hapus?
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           <button type="submit" class="btn btn-danger mt-2" id="btn-hapus">hapus</button>
                                       </div>
                                       </div>
                                   </div>
                                   </div>
                                </form>
                        </td>
                    </tr>    
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection