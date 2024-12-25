<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiFactory> */
    use HasFactory;

    protected $table = 'transaksi';
    protected $primarykey = 'id';
    protected $fillable = ['tanggal_transaksi', 'jumlah_pembayaran', 'status_pembayaran', 'pesanan_id'];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
        
    }
    public function laporanKeuangan() {
        return $this->hasMany(LaporanKeuangan::class);
        
    }
}
