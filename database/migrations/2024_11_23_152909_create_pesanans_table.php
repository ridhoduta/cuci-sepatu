<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan', 5);
            $table->timestamp('tanggal_pesanan')->useCurrent();
            $table->string('status_pesanan', 10)->default('Pending');
            $table->string('merk_barang', 255);
            $table->integer('jenisBarang_id');
            $table->integer('total_biaya');
            $table->string('layanan_id' , 5);
            $table->string('user_id' , 5);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
