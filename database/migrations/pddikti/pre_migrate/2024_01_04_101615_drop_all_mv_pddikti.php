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
        DB::statement("DROP MATERIALIZED VIEW mv_mahasiswa");
        DB::statement("DROP MATERIALIZED VIEW mv_periode");
        DB::statement("DROP MATERIALIZED VIEW mv_kelas");
        DB::statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
        DB::statement("DROP MATERIALIZED VIEW mv_nilai");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP MATERIALIZED VIEW mv_mahasiswa");
        DB::statement("DROP MATERIALIZED VIEW mv_periode");
        DB::statement("DROP MATERIALIZED VIEW mv_kelas");
        DB::statement("DROP MATERIALIZED VIEW mv_mata_kuliah");
        DB::statement("DROP MATERIALIZED VIEW mv_nilai");
    }
};
