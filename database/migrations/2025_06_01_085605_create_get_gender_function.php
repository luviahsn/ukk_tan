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
    DB::unprepared("
        CREATE FUNCTION getGenderCode(code CHAR(1))
        RETURNS VARCHAR(20)
        DETERMINISTIC
        BEGIN
            DECLARE keterangan VARCHAR(20);

            IF code = 'L' THEN
                SET keterangan = 'Laki-Laki';
            ELSEIF code = 'P' THEN 
                SET keterangan = 'Perempuan';
            ELSE
                SET keterangan = 'Tidak Diketahui';
            END IF;

            RETURN keterangan;
        END
    ");
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS getGenderCode");
    }
};