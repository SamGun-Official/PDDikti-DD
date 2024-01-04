<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->string("kode_matkul");
            $table->string("nrp_mahasiswa");
            $table->unique(['kode_matkul', 'nrp_mahasiswa']);
            $table->integer("nilai_uts");
            $table->integer("nilai_uas");
            $table->integer("nilai_akhir");
            $table->string("asal_kampus"); // Contoh: INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA
            $table->timestamps();
        });
        DB::statement("CREATE MATERIALIZED VIEW LOG ON nilai");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
        DB::statement("DROP MATERIALIZED VIEW LOG ON nilai");
    }
};
