@extends('layouts.masterPelanggan')
@section('konten')
<style>
    .btn{
        background-color: #99201E;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 25rem;">
                <img src="/img/layanan1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Paket Basic Clean</h5>
                    <p class="card-text">layanan standar untuk membersihkan kotoran ringan pada bagian luar sepatu, termasuk pengeringan ramah bahan dan pelindung dasar.</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 25rem;">
                <img src="/img/layanan2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Paket Deep Clean</h5>
                    <p class="card-text">pembersihan mendalam untuk noda membandel dan kotoran berat, dengan deodorizing agar sepatu tetap segar</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 25rem;">
                <img src="/img/layanan3.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Paket Premium Care</h5>
                    <p class="card-text">perawatan lengkap untuk sepatu kesayangan, termasuk pembersihan menyeluruh, perbaikan ringan, dan pelindung premium</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection