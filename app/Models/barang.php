<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $fillable = [
        'id',
        'nama_barang',
        'harga'];
    protected $primarykey = 'id';

    public function pesanan() {
        return $this->belongsTo(pesanan::class);
        
    }
}
