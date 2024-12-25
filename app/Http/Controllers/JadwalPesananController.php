<?php

namespace App\Http\Controllers;

use App\Models\jadwalPesanan;
use App\Http\Requests\StorejadwalPesananRequest;
use App\Http\Requests\UpdatejadwalPesananRequest;

class JadwalPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalPesanan = jadwalPesanan::all();
        return view('jadwalPesanan.index', compact('jadwalPesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejadwalPesananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwalPesanan $jadwalPesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwalPesanan $jadwalPesanan, $kode)
    {
        $jadwalPesanan = jadwalPesanan::where('id', $kode)->first();
        return view('jadwalpesanan.jadwalpesananEdit', compact('jadwalPesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejadwalPesananRequest $request, jadwalPesanan $jadwalPesanan, $kode)
    {
        $data = jadwalPesanan::where('id', $kode)->first();
        $data->tanggal_jadwal = $request->tanggal_jadwal;
        $data->update();
        return redirect(route('jadwalPesanan.tampil'))->with('success', 'Data Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwalPesanan $jadwalPesanan, $id)
    {
        $data = jadwalPesanan::where('id', $id)->first();
        $data->delete();
        return redirect(route('pesanan.tampil'))->with('success', 'Data Berhasil dihapus');;
    }
}
