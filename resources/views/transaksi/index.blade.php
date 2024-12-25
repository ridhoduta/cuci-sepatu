@extends('layouts.masterAdmin')
@section('title', 'Transaksi')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $tr)
                    <tr>
                        <td>{{ $tr->pesanan->kode_pesanan }}</td>
                        <td>{{ $tr->tanggal_transaksi }}</td>
                        {{-- <td>{{ $tr->jumlah_pembayaran }}</td> --}}
                        <td>Rp.{{ number_format($tr->jumlah_pembayaran, 0, ',', '.') }}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('transaksi.edit',$tr->id)}}">Update</a>
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