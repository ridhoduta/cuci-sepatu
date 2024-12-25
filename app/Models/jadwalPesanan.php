<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalPesanan extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalPesananFactory> */
    use HasFactory;
    protected $table = 'jadwal_pesanan';
    protected $primarykey = 'id';
    protected $fillable = ['tanggal_jadwal','pesanan_id'];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
        
    }
}
