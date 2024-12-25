<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;
    protected $table = 'layanan';
    protected $primarykey = 'id';
    protected $fillable = ['nama_layanan', 'deskripsi', 'harga'];

    public function pesanan() {
        return $this->hasMany(pesanan::class);
    }
}
