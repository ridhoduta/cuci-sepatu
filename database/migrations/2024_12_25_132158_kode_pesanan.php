<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            DB::statement('
            CREATE TRIGGER before_insert_pesanan
            BEFORE INSERT ON pesanan
            FOR EACH ROW
            BEGIN
                DECLARE random_code VARCHAR(4);
                SET random_code = UPPER(CONCAT(
                    CHAR(65 + FLOOR(RAND() * 26)),  -- Huruf pertama acak
                    CHAR(65 + FLOOR(RAND() * 26)),  -- Huruf kedua acak
                    FLOOR(RAND() * 10),             -- Angka pertama acak
                    FLOOR(RAND() * 10)              -- Angka kedua acak
                ));
                SET NEW.kode_pesanan = CONCAT("P", random_code);
            END ;

        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TRIGGER IF EXISTS kode_pesanan');
    }
};
