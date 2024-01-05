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
        // Materialized View Mahasiswa
        DB::statement("CREATE MATERIALIZED VIEW mv_mahasiswa REFRESH FAST ON AS SELECT * FROM mahasiswa@" . env('DB_DBLINK_1', ''));

        // Materialized View Periode
        DB::statement("CREATE MATERIALIZED VIEW mv_periode REFRESH FAST AS SELECT * FROM periode@" . env('DB_DBLINK_1', ''));

        // Materialized View Kelas
        DB::statement("CREATE MATERIALIZED VIEW mv_kelas REFRESH COMPLETE AS SELECT * FROM kelas@" . env('DB_DBLINK_1', ''));

        // Materialized View Mata Kuliah
        DB::statement("CREATE MATERIALIZED VIEW mv_mata_kuliah REFRESH COMPLETE AS SELECT * FROM mata_kuliah@" . env('DB_DBLINK_1', ''));

        // Materialized View Nilai
        DB::statement("CREATE MATERIALIZED VIEW mv_nilai REFRESH COMPLETE AS SELECT * FROM mv_nilai@" . env('DB_DBLINK_1', ''));

        // Force Purge
        DB::statement("PURGE RECYCLEBIN");
    }
};
