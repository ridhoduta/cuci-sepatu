<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\pesanan;
use App\Models\JenisBarang;
use App\Models\jenis_barang;
use Illuminate\Http\Request;
use App\Models\jadwalPesanan;
use App\Models\laporanKeuangan;
use App\Models\transaksi;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = layanan::all();
        $jenis_barang = jenis_barang::all();
        return view('pelanggan.jenisLayanan', compact('layanan', 'jenis_barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $userOld = User::where('kontak', $request->kontak)->first();
        
            
            if ($userOld) {
                if ($userOld->name !== $request->nama) {
                    return redirect()->route('pesanan.tambah')->with('error', 'Pesanan tidak dapat dilakukan karena kontak sudah digunakan dengan nama yang berbeda.');
                }
                $user = $userOld;
            } else {
                
                $user = new User();
                $user->name = $request->nama;
                $user->email = $request->email;
                $user->kontak = $request->kontak;
                $user->save();
            }
        
            
            $pesanan = new Pesanan();
            $pesanan->user_id = $user->id;
            $pesanan->layanan_id = $request->layanan_id;
            $pesanan->jenisBarang_id = $request->jenis_barang_id;  
            $pesanan->merk_barang = $request->merk;
            $pesanan->total_biaya = $request->total_harga;
            $pesanan->save();
            $pesanan->refresh();
        
            
            $layanan = $pesanan->layanan;
            if (!$layanan) {
                return redirect()->route('pelangganPesan')->with('error', 'Layanan tidak ditemukan.');
            }
        
 
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

            $transaksi->jumlah_pembayaran = $request->total_harga;
            $transaksi->pesanan_id = $pesanan->id;
            $transaksi->save();
            $transaksi->refresh();
        
            $laporan->total_pemasukan = $request->total_harga;
            $laporan->transaksi_id = $transaksi->id;
            $laporan->save();
        
            $kodePesanan = $pesanan->kode_pesanan;
            return redirect()->route('pelangganNota', $kodePesanan);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->route('pelangganPesan')->with('error', "Terjadi kesalahan saat menambahkan pesanan. Silakan coba lagi. Error: " . $e->getMessage());
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function lacak() {
        return view('pelanggan.lacak',['pesanan' => false]);
        
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
            return view('pelanggan.lacak', compact('pesanan','jadwal'))->with('error','pesanan tidak ada');
        }else {
            return view('pelanggan.lacak',compact('pesanan','jadwal'))->with('success','pesanan ditemukan');
        }
        
    }
    public function data_pesanan(Request $request)
    {
        // Validasi data dari form sebelumnya
        $request->validate([
            'jenis_barang' => 'required|exists:jenis_barang,id', // Pastikan jenis_barang ada di tabel jenis_barang
            'layanan_id' => 'required|exists:layanan,id',        // Pastikan layanan_id ada di tabel layanan
            'merk' => 'required|string|max:255',                // Merk wajib diisi
            'totalHarga' => 'required|numeric|min:1',           // Total harga harus valid dan lebih dari 0
        ]);
    
        // Ambil data jenis barang dan layanan dari database
        $jenisBarang = Jenis_Barang::findOrFail($request->input('jenis_barang'));
        $layanan = Layanan::findOrFail($request->input('layanan_id'));
        $merk = $request->input('merk');
        $totalHarga = $request->input('totalHarga');
    
        // Kirim data ke view `pelanggan.dataDiri`
        return view('pelanggan.dataPelanggan', compact('jenisBarang', 'layanan', 'merk', 'totalHarga'));
    }
    public function nota($kode) {
        $pesanan = pesanan::where('kode_pesanan',$kode)->first();
        return view('pelanggan.nota', compact('pesanan'));
        
    }
    public function detailLayanan() {
        $layanan = layanan::all();
        return view('pelanggan.layanan', compact('layanan'));
    }
}
