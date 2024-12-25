<?php

use App\Models\barang;
use App\Models\pesanan;
use App\Models\transaksi;
use App\Models\jenis_barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JadwalPesananController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pelangganController;

Route::get('/', function () {
    return view('landingPage');

});
Route::controller(loginController::class)->group(function () {
    Route::get('/login-admin', 'index')->name('loginView');
    Route::get('/register', 'register')->name('login.register');
    
});
Route::middleware(['auth','Admin'])->group(function () {
    Route::get('/dashboard', function () {
        $pesanan = DB::table('pesanan')
        ->select('status_pesanan')
        ->get();
        $statusCount = $pesanan->groupBy('status_pesanan')->map->count();
        $jumlah = pesanan::all()->count();
        return view('dashboard', ['statusCount' => $statusCount, 'jumlah' => $jumlah]);
    });
    Route::controller(PesananController::class)->group( function (){
        Route::get('/pesanan', 'index')->name('pesanan.tampil');
        Route::get('/pesanan/edit/{kode}', 'edit')->name('pesanan.edit');
        Route::post('/pesanan/edit/{kode}', 'update')->name('pesanan.update');
        Route::get('/pesanan/tambah', 'create')->name('pesanan.tambah');
        Route::post('/pesanan/tambah', 'store')->name('pesanan.tambah');
        Route::get('/pesanan/lacak', 'formLacak')->name('pesanan.formLacak');
        Route::post('/pesanan/lacak', 'showLacak')->name('pesanan.showLacak');
        Route::post('/pesanan/hapus/{kode}', 'destroy')->name('pesanan.hapus');
        
    });
    Route::controller(LayananController::class)->group(function () {
        Route::get('/layanan', 'index')->name('layanan.tampil');
        Route::get('/layanan/tambah', 'create')->name('layanan.tambah');
        Route::post('/layanan/tambah', 'store')->name('layanan.tambah');
        Route::get('/layanan/edit/{kode}', 'edit')->name('layanan.edit');
        Route::post('/layanan/edit/{kode}', 'update')->name('layanan.update');  
        Route::get('/layanan/tambah', 'create')->name('layanan.tambah');
        Route::post('/layanan/hapus/{kode}', 'destroy')->name('layanan.hapus');
    });
    
    Route::controller(JadwalPesananController::class)->group( function (){
        Route::get('/jadwal-pesanan', 'index')->name('jadwalPesanan.tampil');
        Route::get('/jadwalpesanan/edit/{kode}', 'edit')->name('jadwalpesanan.edit');
        Route::post('/jadwalpesanan/edit/{kode}', 'update')->name('jadwalpesanan.update');
        Route::get('/jadwalpesanan/tambah', 'create')->name('jadwalpesanan.tambah');
        Route::post('/jadwalpesanan/hapus/{kode}', 'destroy')->name('jadwalpesanan.hapus');
        
    });
    Route::controller(TransaksiController::class)->group( function (){
        Route::get('/transaksi', 'index')->name('transaksi.tampil');
        Route::get('/transaksi/edit/{kode}', 'edit')->name('transaksi.edit');
        Route::post('/transaksi/edit/{kode}', 'update')->name('transaksi.update');
        Route::get('/transaksi/tambah', 'create')->name('transaksi.tambah');
        Route::post('/transaksi/hapus/{kode}', 'destroy')->name('transaksi.hapus');
        
    });                     
    Route::controller(LaporanKeuanganController::class)->group( function (){
        Route::get('/laporan-keuangan', 'index')->name('laporanKeuangan.tampil');
        Route::get('/laporanKeuangan/edit/{kode}', 'edit')->name('laporanKeuangan.edit');
        Route::post('/laporanKeuangan/edit/{kode}', 'update')->name('laporanKeuangan.update');
        Route::get('/laporanKeuangan/tambah', 'create')->name('laporanKeuangan.tambah');
        Route::get('/laporanKeuangan/export/pdf', 'pdf')->name('laporanKeuangan.expdf');
        Route::post('/laporanKeuangan/hapus/{kode}', 'destroy')->name('laporanKeuangan.hapus');
        Route::get('/laporanKeuangan/export/excel', 'excel')->name('laporanKeuangan.excel');
        
    });
    
    Route::controller(JenisBarangController::class)->group(function () {
        Route::get('/jenis-barang', 'index')->name('jenisBarang.tampil');
        Route::get('/jenis-barang/tambah', 'create')->name('jenisBarang.tambah');
        Route::post('/jenis-barang/tambah', 'store')->name('jenisBarang.tambah');
        Route::get('/jenisBarang/edit/{kode}', 'edit')->name('jenisBarang.edit');
        Route::post('/jenisBarang/edit/{kode}', 'update')->name('jenisBarang.update');
        // Route::get('/jenisBarang/tambah', 'create')->name('jenisBarang.tambah');
        Route::post('/jenisBarang/hapus/{kode}', 'destroy')->name('jenisBarang.hapus');
    });
});
Route::controller(pelangganController::class)->group(function () {
    Route::get('/pesan', 'create')->name('pelangganPesan');
    Route::post('/pesan/data-pesan', 'data_pesanan')->name('pelangganDatapesan');
    Route::post('/pesan', 'store')->name('pelangganPesan');
    Route::get('/lacak', 'lacak')->name('pelangganLacak');
    Route::post('/lacak', 'showLacak')->name('pelangganLacak');
    Route::get('/nota/{kode}', 'nota')->name('pelangganNota');

    Route::get('/detail-layanan', 'detailLayanan')->name('detailLayanan');
});