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
        // Materialized View Nilai
        DB::statement("CREATE MATERIALIZED VIEW mv_nilai REFRESH FAST ON COMMIT AS SELECT * FROM nilai@" . env('DB_DBLINK_3', ''));

        // Materialized View Dosen
        DB::statement("CREATE MATERIALIZED VIEW mv_dosen REFRESH FAST ON COMMIT AS SELECT * FROM dosen@" . env('DB_DBLINK_2', ''));

        // Force Purge
        DB::statement("PURGE RECYCLEBIN");
    }
};
