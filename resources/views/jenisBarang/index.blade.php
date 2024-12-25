@extends('layouts.masterAdmin')
@section('title', 'Table Pesanan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <a href="{{route('jenisBarang.tambah')}}" class="btn btn-primary m-3">Tambah Jenis Barang</a>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis_barang as $jb)
                    <tr>
                        <td>{{ $jb->nama_barang }}</td>
                        <td>{{ $jb->harga_barang}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('jenisBarang.edit',$jb->id)}}">Update</a>
                            <form action="{{route('jenisBarang.hapus', $jb->id)}}" method="POST">
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