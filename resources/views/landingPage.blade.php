@extends('layouts.masterPelanggan')
@section('konten')
<style>
    .section-1{
        height: auto;
    }
   
    .row-hero{
        margin: 140px auto;
    }
    .row-hero .item-1 .text h1{
        font-size: 35px;/
    }
    .row-hero .item-1 .text p{
        line-height: 20px;
    }
    .row-hero .item-1 button{
        width: 374px;
        height: 39px;
        border-radius:50px;
        background-color:#99201E;
        color: #ffff;
        border: none;
    }
    .section-2{
        height: 100vh;
        align-content: center;
    }
    .row-card {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .col-4 {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-footer{
        /* height: 10px; */
        display: flex;
        justify-content:space-between ;
    }
    .card-footer h3{
        font-size: 20px;
    }
    .card-footer a{
        text-decoration: none;
        color: gold;
    }
    .footer{
        height: 20vh;
        background-color: #99201E;
        color:white;
    }
    .img-bg{
        height: 70vh;
        background-image: url('/img/imgKontak.png');
        background-size:cover; 
    }

</style>

<div class="container section-1 section" data-section="beranda">
    <div class="row row-hero">
        <div class="col-7">
            <div class="item-1">
                <div class="text">
                    <h1 class="mb-3">Selamat Datang di Hoby Shoes Tulungagung</h1>
                    <p>Hobby Shoes Tulungagung siap merawat dan memperbaiki sepatu, tas, dan helm Anda!
                        Dengan layanan cuci kilat, repaint, dan repair, kami hadir untuk menjaga barang kesayangan 
                        Anda tetap bersih dan tampak baru. Percayakan perawatan terbaik hanya di Hobby Shoes!</p>
                </div>
                <div class="button d-flex p-3">
                    <button type="button" class="m-2"><a href="{{route('detailLayanan')}}" class="text-decoration-none text-white">Nikmati Layanan Kami</a></button>
                    <button type="button" class="m-2"><a href="{{route('pelangganPesan')}}" class="text-decoration-none text-white">Pesan</a></button>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="item-2">
                <img src="/img/logo.png" alt="belum ada foto" width="80%">
            </div>
        </div>
    </div>
</div>
<div class="container section-2 section" id="layanan" data-section="layanan">
    <div class="row row-card">
        <div class="col-4">
            <div class="card text-center text-bg-dark">
                <div class="card-header"></div>
                <div class="card-body">
                  <img src="/img/layanan1.png" alt="foto layanan">
                </div>
                <div class="card-footer">
                    <h3 class="mb-3">Paket Basic Clean</h3>
                    <a href="{{route('detailLayanan')}}" class="mt-5">Lihat Selengkapnya</a>
                  </div>
              </div>
        </div>
        <div class="col-4">
            <div class="card text-center text-bg-dark">
                <div class="card-header"></div>
                <div class="card-body">
                  <img src="/img/layanan2.png" alt="foto layanan">
                </div>
                <div class="card-footer">
                    <h3 class="mb-3">Paket Deep Clean</h3>
                    <a href="{{route('detailLayanan')}}" class="mt-5">Lihat Selengkapnya</a>
                  </div>
              </div>
        </div>
        <div class="col-4">
            <div class="card text-center text-bg-dark">
                <div class="card-header"></div>
                <div class="card-body">
                  <img src="/img/layanan3.png" alt="foto layanan">
                </div>
                <div class="card-footer">
                    <h3 class="mb-3">Paket Premium Care</h3>
                    <a href="{{route('detailLayanan')}}" class="mt-5">Lihat Selengkapnya</a>
                  </div>
              </div>
        </div>
    </div>
</div>
<div class="img-bg" id="kontak">
    <div class="container section-3">
        
    </div>
</div>
<div class="footer">
    <div class="container section-4">
        <div class="row row-foot">
            <div class="col-4">
                <div class="text">
                    <h1>Alamat Toko</h1>
                    <p style="line-height: 20px;">Jl. Pangeran Antasari Selatan Stasiun No.3, 
                        Kampungdalem, Kec. Tulungagung, Kabupaten
                        Tulungagung, Jawa Timur 66212</p>
                    <p>0856-0836-1619</p>
                </div>
            </div>
            <div class="col-4">
                <div class="text">
                    <h1>Jam Pelayanan</h1>
                    <p>Senin - Kamis: 10.00 A.M - 08.00 P.M </p>
                    <p>Jumat: 02.00 P.M - 08.00 P.M</p> 
                    <p>Sabtu - Minggu : 10.00 A.M - 08.00 P.M</p>
                </div>
            </div>
            <div class="col-4">
                <div class="text">
                    <h1>Sosial Media</h1>
                    <p>hobbyshoesclean.tulungagung/p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection