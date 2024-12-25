<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanKeuangan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanKeuanganFactory> */
    use HasFactory;
    protected $table = 'laporan_keuangan';
    protected $primarykey = 'id';
    protected $fillable = ['total_pemasukan','transaksi_id'];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
        
    }
}
