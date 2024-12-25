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
                            <a class="btn btn-warning"href="{{route('laporanKeuangan.edit',$lk->id)}}">Update</a>
                            <form action="" method="POST">
                             @csrf
                              <button class="btn btn-danger mt-2">hapus</button>
                             </form>
                         </td>
                    </tr>    
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection