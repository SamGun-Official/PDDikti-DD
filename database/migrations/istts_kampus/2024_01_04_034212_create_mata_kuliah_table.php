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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string("kode_matkul")->primary(); // Contoh: IF963
            $table->string("nama_matkul");
            $table->string("kode_kelas"); // Contoh: A, B, C, X
            $table->string("id_periode");
            $table->string("nidn_dosen");
            $table->integer("sks");
            $table->string("asal_kampus"); // Contoh: INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA
            $table->boolean("status"); // 1 = Active, 0 = Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
