<?php

namespace App\Http\Controllers;
use App\Models\jenis_barang;
use App\Http\Requests\Storejenis_barangRequest;
use App\Http\Requests\Updatejenis_barangRequest;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_barang = jenis_barang::all();
        return view('jenisBarang.index', compact('jenis_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisBarang.jenisTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storejenis_barangRequest $request)
    {
        try {
            // Validasi input otomatis dilakukan oleh Storejenis_barangRequest
            
            // Simpan data jenis barang ke dalam tabel
            $jenisBarang = new jenis_barang();
            $jenisBarang->nama_barang = $request->nama_barang;
            $jenisBarang->harga_barang = $request->harga_barang;
            $jenisBarang->save();

            // Redirect dengan pesan sukses
            return redirect()->route('jenisBarang.tampil')->with('success', 'Jenis Barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangani jika ada kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan jenis barang: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(jenis_barang $jenis_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis_barang $jenis_barang,$kode)
    {
        $jenis_barang = jenis_barang::where('id', $kode)->first();
        return view('jenisbarang.jenisbarangEdit',compact('jenis_barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatejenis_barangRequest $request, jenis_barang $jenis_barang, $kode)
    {
        $data = jenis_barang::where('id', $kode)->first();
        $data->nama_barang = $request->nama_barang;
        $data->harga_barang = $request->harga_barang;
        $data->update();
        return redirect(route('jenisBarang.tampil'))->with('success', 'Data Berhasil diUpdate');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis_barang $jenis_barang, $id)
    {
        $data = jenis_barang::where('id', $id)->first();
        $data->delete();
        return redirect(route('layanan.tampil'))->with('success', 'Data Berhasil dihapus');;
    }
}
