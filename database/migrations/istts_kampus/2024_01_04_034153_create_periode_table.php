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
        Schema::create('periode', function (Blueprint $table) {
            $table->string('id_periode')->primary(); // Contoh: ISTTS001
            $table->string("asal_kampus"); // Contoh: INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA
            $table->enum("jenis_semester", ["Ganjil", "Genap"]);
            $table->string("tahun_ajaran");
            $table->timestamps();
        });
        DB::statement("CREATE MATERIALIZED VIEW LOG ON periode");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
        DB::statement("DROP MATERIALIZED VIEW LOG ON periode");
    }
};
