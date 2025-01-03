<?php

namespace App\Http\Controllers;

use App\Exports\laporanExport;
use App\Models\laporanKeuangan;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorelaporanKeuanganRequest;
use App\Http\Requests\UpdatelaporanKeuanganRequest;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanKeuangan = laporanKeuangan::all();
        return view('laporanKeuangan.index', compact('laporanKeuangan'));
        //
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
    public function store(StorelaporanKeuanganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(laporanKeuangan $laporanKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(laporanKeuangan $laporanKeuangan,$kode)
    {
        $laporanKeuangan = laporanKeuangan::where('id', $kode)->first();
        // return $laporanKeuangan->total_pemasukan;
        return view('laporankeuangan.laporankeuanganEdit',compact('laporanKeuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelaporanKeuanganRequest $request, laporanKeuangan $laporanKeuangan, $kode)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laporanKeuangan $laporanKeuangan, $id)
    {
        $data = laporanKeuangan::where('id', $id)->first();
        $data->delete();
        return redirect(route('laporanKeuangan.tampil'))->with('success', 'Data Berhasil dihapus');
        
    }
    public function pdf() {
        $laporanKeuangan = laporanKeuangan::all();
        $totalPemasukan = laporanKeuangan::sum('total_pemasukan');
        return view('laporanKeuangan.pdf',compact('laporanKeuangan','totalPemasukan'));
        
    }
    public function excel() {
        return excel::download(new laporanExport,'laporan-keuangan.xlsx');
        
    }
}
