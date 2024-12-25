<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorepesananRequest;
use App\Http\Requests\UpdatepesananRequest;
use App\Models\jadwalPesanan;
use App\Models\jenis_barang;
use App\Models\laporanKeuangan;
use App\Models\layanan;
use App\Models\transaksi;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Complexity\Complexity;

use function PHPSTORM_META\type;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = pesanan::all();
        return view('Pesanan.index', compact('pesanan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = layanan::all();
        $jenis_barang = jenis_barang::all();
        return view('pesanan.formTambah', compact('layanan', 'jenis_barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepesananRequest $request)
    {
        try {
            // Cek apakah user sudah ada berdasarkan kontak
            $userOld = User::where('kontak', $request->kontak)->first();

            // Jika user ditemukan dan nama berbeda
            if ($userOld) {
                if ($userOld->name !== $request->nama) {
                    return redirect()->route('pesanan.tambah')->with('error', 'Pesanan tidak dapat dilakukan karena kontak sudah digunakan dengan nama yang berbeda.');
                }
                $user = $userOld;
            } else {
                // Jika user tidak ditemukan, buat user baru
                $user = new User();
                $user->name = $request->nama;
                $user->email = $request->email;
                $user->kontak = $request->kontak;
                $user->save();
            }

            // Buat pesanan baru
            $pesanan = new Pesanan();
            $pesanan->user_id = $user->id;
            $pesanan->layanan_id = $request->layanan_id;
            $pesanan->jenisBarang_id = $request->jenis_barang;
            $pesanan->merk_barang = $request->merkBarang;
            $pesanan->total_biaya = $request->totalHarga;
            $pesanan->save();
            $pesanan->refresh();

            // Pastikan layanan ada
            $layanan = $pesanan->layanan;
            if (!$layanan) {
                return redirect()->route('pesanan.tambah')->with('error', 'Layanan tidak ditemukan.');
            }

            // Tentukan interval berdasarkan nama layanan
            $interval = 2; // Default
            $layanan_hari = [
                'Paket Deep Clean' => $layanan->hari,
                'Paket Premium Care' => $layanan->hari,
                'Paket Basic Clean' => $layanan->hari,
            ];

            if (array_key_exists($layanan->nama_layanan, $layanan_hari)) {
                $interval = $layanan_hari[$layanan->nama_layanan];
            }

            $jadwal = new JadwalPesanan();
            $transaksi = new transaksi();
            $laporan = new laporanKeuangan();

            $jadwal->pesanan_id = $pesanan->id;
            $jadwal->tanggal_jadwal = now()->addDays($interval);
            $jadwal->save();

            $transaksi->jumlah_pembayaran = $request->totalHarga;
            $transaksi->pesanan_id = $pesanan->id;
            $transaksi->save();
            $transaksi->refresh();
        
            $laporan->total_pemasukan = $request->totalHarga;
            $laporan->transaksi_id = $transaksi->id;
            $laporan->save();

            $kodePesanan = $pesanan->kode_pesanan;
            return redirect()->route('pesanan.tambah')->with('success', "Pesanan berhasil ditambahkan! Kode Pesanan: $kodePesanan");
        } catch (\Exception $e) {
            return redirect()->route('pesanan.tambah')->with('error', "Terjadi kesalahan saat menambahkan pesanan. Silakan coba lagi. Error: " . $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(pesanan $pesanan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kode)->first();
        $layanan = layanan::all();
        $jenis_barang = jenis_barang::all();
        return view('pesanan.pesananEdit', ['pesanan' => $pesanan, 'layanan' => $layanan, 'jenis_barang' => $jenis_barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepesananRequest $request, pesanan $pesanan, $kode)
    {
        $pesanan = pesanan::where('kode_pesanan', $kode)->first();
        

        if ($request->status_pesanan == 'Dibatalkan') {
            $pesananID = $pesanan->id;
            $jadwal = jadwalPesanan::where('pesanan_id', $pesananID)->first();
            $transaksi = transaksi::where('pesanan_id', $pesananID)->first();
            $transaksiID = $transaksi->id;
            $laporan = laporanKeuangan::where('transaksi_id', $transaksiID)->first();
            $jadwal->delete();
            $transaksi->delete();
            $laporan->delete();
            $pesanan->layanan_id = $request->layanan_id;
            $pesanan->jenisBarang_id = $request->jenisBarang_id;
            $pesanan->status_pesanan = $request->status_pesanan;
            $pesanan->update();
            return redirect(route('pesanan.tampil'))->with('success', 'Data Berhasil diUpdate');
        }else {
            $pesanan->layanan_id = $request->layanan_id;
            $pesanan->jenisBarang_id = $request->jenisBarang_id;
            $pesanan->status_pesanan = $request->status_pesanan;
            $pesanan->update();
            return redirect(route('pesanan.tampil'))->with('success', 'Data Berhasil diUpdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode)
    {
        $pesanan = pesanan::where('kode_pesanan', $kode)->first();
        $pesananID = $pesanan->id;
        $jadwal = jadwalPesanan::where('pesanan_id', $pesananID)->first();
        $transaksi = transaksi::where('pesanan_id', $pesananID)->first();
        $transaksiID = $transaksi->id;
        $laporan = laporanKeuangan::where('transaksi_id', $transaksiID)->first();
        $pesanan->delete();
        $jadwal->delete();
        $transaksi->delete();
        $laporan->delete();
        return redirect(route('pesanan.tampil'))->with('success', 'Data Berhasil dihapus');

        
    }
    public function formLacak() {
        return view('pesanan.formLacak',['pesanan' => false]);
        
    }
    public function showLacak(Request $request)
    {
        $validasi = $request->validate([
            'kode' => 'required'
        ]);
        $pesanan = pesanan::where('kode_pesanan',$validasi['kode'])->first();
        $pesanan_id = $pesanan->id;
        $jadwal = jadwalPesanan::where('pesanan_id', $pesanan_id)->first();
        if(!$pesanan){
            return view('pesanan.formLacak', compact('pesanan','jadwal'))->with('error','pesanan tidak ada');
        }else {
            return view('pesanan.formLacak',compact('pesanan','jadwal'))->with('success','pesanan ditemukan');
        }
        
    }


}
