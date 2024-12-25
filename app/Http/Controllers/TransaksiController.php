<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return view('transaksi.index', compact('transaksi'));
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
    public function store(StoretransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi, $kode)
    {
        $transaksi = transaksi::where('id', $kode)->first();
        return view('Transaksi.TransaksiEdit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi, $kode)
    {
        $data = transaksi::where('id', $kode)->first();
        $data->tanggal_transaksi = $request->tanggal_transaksi;
        $data->jumlah_pembayaran = $request->jumlah_pembayaran;
        $data->status_pembayaran = $request->status_pembayaran;
        $data->update();
        return redirect(route('transaksi.tampil'))->with('success', 'Data Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi, $id)
    {
        $transaksi = transaksi::where('id', $id)->first();
        $transaksi->delete();
        return redirect(route('transaksi.tampil'))->with('success', 'Data Berhasil dihapus');
    }
}
