<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Http\Requests\StorelayananRequest;
use App\Http\Requests\UpdatelayananRequest;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.layananTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelayananRequest $request)
    {
        try {
            $layanan = new Layanan();
            $layanan->nama_layanan = $request->nama_layanan;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->hari = $request->hari;
            $layanan->harga = $request->harga;
            $layanan->save();
    
            // Redirect dengan pesan sukses
            return redirect()->route('layanan.tampil')->with('success', 'Layanan berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangani jika ada kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan layanan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(layanan $layanan, $kode)
    {
        $layanan = layanan::where('id', $kode)->first();
        return view('layanan.layananEdit',compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelayananRequest $request, layanan $layanan, $kode)
    {
        $data = layanan::where('id', $kode)->first();
        $data->nama_layanan = $request->nama_layanan;
        $data->hari = $request->hari;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->update();
        return redirect(route('layanan.tampil'))->with('success', 'Data Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(layanan $layanan, $id)
    {
        $data = layanan::where('id', $id)->first();
        $data->delete();
        return redirect(route('layanan.tampil'))->with('success', 'Data Berhasil dihapus');;
    }
}
