<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('jenis_barang')->insert([
            [ 'nama_barang' => 'Tas', 'harga_barang' => 20000],
            [ 'nama_barang' => 'Sepatu', 'harga_barang' => 35000],
            [ 'name' => 'Helm', 'harga_barang' => 25000]
        ]);
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'role' => 'Admin', 'password' => bcrypt('admin')],
        ]);

        DB::table('layanan')->insert([
            ['nama_layanan' => 'Paket Basic Clean', 'deskripsi' => ' layanan standar untuk membersihkan kotoran ringan pada bagian luar sepatu, termasuk pengeringan ramah bahan dan pelindung dasar.', 'harga' => 500000, 'hari' => 3],
            ['nama_layanan' => 'Paket Deep Clean', 'deskripsi' => 'pembersihan mendalam untuk noda membandel dan kotoran berat, dengan deodorizing agar sepatu tetap segar.', 'harga' => 300000,'hari' => 4],
            ['nama_layanan' => 'Paket Premium Care', 'deskripsi' => 'perawatan lengkap untuk sepatu kesayangan, termasuk pembersihan menyeluruh, perbaikan ringan, dan pelindung premium.', 'harga' => 150000, 'hari' => 5]
        ]);

    }
}
