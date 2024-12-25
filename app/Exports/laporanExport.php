<?php

namespace App\Exports;

use App\Models\laporanKeuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class laporanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil data laporan keuangan beserta relasi transaksi
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Memuat laporan keuangan beserta relasi transaksi
        return laporanKeuangan::with('transaksi')->get();
    }

    /**
     * Tentukan heading untuk file Excel
     */
    public function headings(): array
    {
        return [
            'Kode Pesanan',
            'Tanggal Transaksi',
            'Total Pemasukan',
        ];
    }

    /**
     * Mapping data untuk setiap baris export
     */
    public function map($laporan): array
    {
        return [
            $laporan->transaksi->pesanan->kode_pesanan ?? 'N/A',         // Ambil Kode Pesanan
            $laporan->transaksi->tanggal_transaksi ?? 'N/A',  // Ambil Tanggal Transaksi
            $laporan->total_pemasukan,                       // Total Pemasukan
        ];
    }
}

