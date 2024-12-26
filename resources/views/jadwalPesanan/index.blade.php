@extends('layouts.masterAdmin')
@section('title', 'Jadwal Pesanan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Kode Pesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Ambil</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalPesanan as $jp)
                    <tr>
                        <td>{{ $jp->pesanan->user->name }}</td>
                        <td>{{ $jp->pesanan->kode_pesanan }}</td>
                        <td>{{ $jp->pesanan->tanggal_pesanan }}</td>
                        <td>{{ $jp->tanggal_jadwal }}</td>
                        <td>
                            <a class="btn btn-warning"href="{{route('jadwalpesanan.edit',$jp->id)}}">Update</a>
                            {{-- <form action="" method="POST">
                             @csrf
                              <button class="btn btn-danger mt-2">hapus</button>
                             </form> --}}
                             <form action="{{route('jadwalpesanan.hapus', $jp->id)}}" method="POST">
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection