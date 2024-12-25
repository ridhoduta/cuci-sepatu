<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_barang extends Model
{
    /** @use HasFactory<\Database\Factories\JenisBarangFactory> */
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $fillable = [
        'id',
        'nama_barang',
        'harga_barang'];
    protected $primarykey = 'id';

    public function pesanan() {
        return $this->belongsTo(pesanan::class);
        
    }
}
