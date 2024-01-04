<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Materialized View Kelas
        DB::statement("CREATE MATERIALIZED VIEW mv_kelas REFRESH COMPLETE AS SELECT * FROM kelas@" . env('DB_DBLINK_4', ''));

        // Materialized View Mata Kuliah
        DB::statement("CREATE MATERIALIZED VIEW mv_mata_kuliah REFRESH COMPLETE AS SELECT * FROM mata_kuliah@" . env('DB_DBLINK_4', ''));

        // Force Purge
        DB::statement("PURGE RECYCLEBIN");
    }
};
