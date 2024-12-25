@extends('layouts.masterAdmin')
@section('title', 'Table Layanan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <a href="{{route('layanan.tambah')}}" class="btn btn-primary m-3">Tambah Layanan</a>
                    <tr>
                        <th>Nama Layanan</th>
                        <th class="text-center">Deskripsi</th>
                        <th>Harga</th>
                        <th>Hari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanan as $l)
                    <tr>
                        <td>{{ $l->nama_layanan }}</td>
                        <td class="text-truncate" style="max-width: 150px;">
                            <span class="truncated-text" id="text-truncated">{{ $l->deskripsi }}</span>
                            <span class="full-text" style="display: none;">{{ $l->deskripsi }}</span>
                            <a href="javascript:void(0);" class="show-more">show more</a>
                        </td>                        
                        <td>Rp.{{ number_format($l->harga, 0, ',', '.') }}</td>
                        <td>{{ $l->hari }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('layanan.edit',$l->id)}}">Update</a>
                            {{-- <form action="{{route('layanan.hapus', $l->id)}}" method="POST">
                             @csrf
                              <button class="btn btn-danger mt-2" type="submit">hapus</button>
                             </form> --}}
                             <form action="{{route('layanan.hapus', $l->id)}}" method="POST">
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
<script>

document.addEventListener("DOMContentLoaded", function() {
    const showButton = document.querySelector(".show-more");
    const truncatedText = document.querySelector(".truncated-text");
    const fullText = document.querySelector(".full-text");

    showButton.addEventListener("click", function() {
        if (this.textContent === "show more") {
            truncatedText.style.display = "none"; // Sembunyikan teks terpotong
            fullText.style.display = "inline"; // Tampilkan teks lengkap
            this.textContent = "show less"; // Ganti teks tombol menjadi "show less"
        } else {
            truncatedText.style.display = "inline"; // Tampilkan teks terpotong
            fullText.style.display = "none"; // Sembunyikan teks lengkap
            this.textContent = "show more"; // Ganti teks tombol kembali menjadi "show more"
        }
    });
});


</script>
@endsection