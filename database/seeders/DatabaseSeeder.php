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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     // UserSeeder::class,
        //     LayananSeeder::class,
        //     PesananSeeder::class,
        //     JadwalPesananSeeder::class,
        //     TransaksiSeeder::class,
        //     LaporanKeuanganSeeder::class,
        // ]);

        // DB::table('users')->insert([
        //     [ 'name' => 'John Doe', 'kontak' => '081234567890','email' => 'ridhodutay@gmail.com'],
        //     [ 'name' => 'Jane Smith', 'kontak' => '081987654321','email' => 'ridhoduta1@gmail.com'],
        //     [ 'name' => 'Alice Johnson', 'kontak' => '081223344556','email' => 'ridhoduta2@gmail.com']
        // ]);
        DB::table('jenis_barang')->insert([
            [ 'nama_barang' => 'Tas', 'harga_barang' => 20000],
            [ 'nama_barang' => 'Sepatu', 'harga_barang' => 35000],
            [ 'name' => 'Helm', 'harga_barang' => 25000]
        ]);
        DB::table('users')->insert([
            ['name' => 'Ridho', 'email' => 'ridhodutay@gmail.com', 'kontak' => '089123123321', 'role' => 'Admin', 'password' => bcrypt('123123')],
            // ['name' => 'Ridho Duta'hp, 'email' => 'ridhodutaa@gmail.com', 'kontak' => '0895368403198', 'password' => bcrypt('321321')]
        ]);

        DB::table('layanan')->insert([
            ['nama_layanan' => 'Paket Basic Clean', 'deskripsi' => ' layanan standar untuk membersihkan kotoran ringan pada bagian luar sepatu, termasuk pengeringan ramah bahan dan pelindung dasar.', 'harga' => 500000, 'hari' => 3],
            ['nama_layanan' => 'Paket Deep Clean', 'deskripsi' => 'pembersihan mendalam untuk noda membandel dan kotoran berat, dengan deodorizing agar sepatu tetap segar.', 'harga' => 300000,'hari' => 4],
            ['nama_layanan' => 'Paket Premium Care', 'deskripsi' => 'perawatan lengkap untuk sepatu kesayangan, termasuk pembersihan menyeluruh, perbaikan ringan, dan pelindung premium.', 'harga' => 150000, 'hari' => 5]
        ]);

        // DB::table('Pesanan')->insert([
        //     ['layanan_id' => 1, 'user_id' => 1, 'tanggal_pesanan' => '2024-11-10', 'status_pesanan' => 'Diproses', 'total_biaya' => 500000, 'kode_pesanan' => 'P001','jenisBarang_id' => 'Tas'],
        //     ['layanan_id' => 2, 'user_id' => 2, 'tanggal_pesanan' => '2024-11-12', 'status_pesanan' => 'Selesai', 'total_biaya' => 300000, 'kode_pesanan' => 'P002', 'jenisBarang_id' => 'Tas'],
        //     ['layanan_id' => 3, 'user_id' => 3, 'tanggal_pesanan' => '2024-11-15', 'status_pesanan' => 'Dibatalkan', 'total_biaya' => 150000, 'kode_pesanan' => 'P003', 'jenisBarang_id' => 'Tas']
        // ]);

        // DB::table('Jadwal_Pesanan')->insert([
        //     ['pesanan_id' => 1, 'tanggal_jadwal' => '2024-11-11'],
        //     ['pesanan_id' => 2, 'tanggal_jadwal' => '2024-11-13'],
        //     ['pesanan_id' => 3, 'tanggal_jadwal' => '2024-11-16']
        // ]);

        // DB::table('Transaksi')->insert([
        //     ['pesanan_id' => 1, 'tanggal_transaksi' => '2024-11-11', 'jumlah_pembayaran' => 500000, 'status_pembayaran' => 'Lunas'],
        //     ['pesanan_id' => 2, 'tanggal_transaksi' => '2024-11-13', 'jumlah_pembayaran' => 300000, 'status_pembayaran' => 'Lunas'],
        //     ['pesanan_id' => 3, 'tanggal_transaksi' => '2024-11-16', 'jumlah_pembayaran' => 0, 'status_pembayaran' => 'Dibatalkan']
        // ]);

        // DB::table('Laporan_Keuangan')->insert([
        //     ['transaksi_id' => 1, 'total_pemasukan' => 500000],
        //     ['transaksi_id' => 2, 'total_pemasukan' => 300000]
        // ]);

        // $faker = Faker::create();
        // DB::table('Pesanan')->insert([
        //     [
        //         'layanan_id' => 1,
        //         'user_id' => $faker->numberBetween(1, 2),  // Random antara 1 dan 3
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),  // Random tanggal sekarang
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),  // Random status
        //         'total_biaya' => $faker->numberBetween(100000, 500000),  // Random total biaya antara 100.000 hingga 500.000
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),  // Membuat kode pesanan unik
        //         'jenisBarang_id' => $faker->numberBetween(1,3)  // Random jenis barang
        //     ],
        //     [
        //         'layanan_id' => 2,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ],
        //     [
        //         'layanan_id' => 3,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ],
        //     [
        //         'layanan_id' => 1,
        //         'user_id' => $faker->numberBetween(1, 2),  // Random antara 1 dan 3
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),  // Random tanggal sekarang
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),  // Random status
        //         'total_biaya' => $faker->numberBetween(100000, 500000),  // Random total biaya antara 100.000 hingga 500.000
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),  // Membuat kode pesanan unik
        //         'jenisBarang_id' => $faker->numberBetween(1,3)  // Random jenis barang
        //     ],
        //     [
        //         'layanan_id' => 2,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ],
        //     [
        //         'layanan_id' => 3,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ],
        //     [
        //         'layanan_id' => 1,
        //         'user_id' => $faker->numberBetween(1, 2),  // Random antara 1 dan 3
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),  // Random tanggal sekarang
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),  // Random status
        //         'total_biaya' => $faker->numberBetween(100000, 500000),  // Random total biaya antara 100.000 hingga 500.000
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),  // Membuat kode pesanan unik
        //         'jenisBarang_id' => $faker->numberBetween(1,3)  // Random jenis barang
        //     ],
        //     [
        //         'layanan_id' => 2,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ],
        //     [
        //         'layanan_id' => 3,
        //         'user_id' => $faker->numberBetween(1, 2),
        //         'tanggal_pesanan' => $faker->date('Y-m-d', 'now'),
        //         'status_pesanan' => $faker->randomElement(['Diproses', 'Selesai', 'Dibatalkan']),
        //         'total_biaya' => $faker->numberBetween(100000, 500000),
        //         'kode_pesanan' => 'P' . $faker->unique()->numberBetween(100, 999),
        //         'jenisBarang_id' => $faker->numberBetween(1,3)
        //     ]
        // ]);
    }
}
