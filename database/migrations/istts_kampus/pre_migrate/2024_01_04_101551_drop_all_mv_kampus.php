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
        DB::statement("DROP MATERIALIZED VIEW mv_nilai");
        DB::statement("DROP MATERIALIZED VIEW mv_dosen");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP MATERIALIZED VIEW mv_nilai");
        DB::statement("DROP MATERIALIZED VIEW mv_dosen");
    }
};
