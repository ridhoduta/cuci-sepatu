<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PesananFactory> */
    use HasFactory;
    protected $table = 'pesanan';
    protected $primarykey = 'id';
    protected $fillable = ['kode_pesanan', 'tanggal_pesanan', 'status_pesanan', 'total_biaya', 'layanan_id', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'layanan_id');
        
    }
    public function jenis_barang() {
        return $this->belongsTo(jenis_barang::class, 'jenisBarang_id');
        
    }

    public function jadwalPesanan() {
        return $this->hasMany(JadwalPesanan::class);
        
    }
    public function transaksi() {
        return $this->hasMany(Transaksi::class);
        
    }
}
