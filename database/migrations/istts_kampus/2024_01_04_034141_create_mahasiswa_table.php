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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string("nrp_mahasiswa")->primary();
            $table->string("nama_lengkap");
            $table->enum("jenis_kelamin", ["Laki-laki", "Perempuan"]);
            $table->date("tanggal_lahir");
            $table->string("asal_kampus"); // Contoh: INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA
            $table->enum("jenjang", ["S1", "S2", "S3"]);
            $table->string("semester_awal"); // Contoh: Ganjil 2020/2021
            $table->enum("status", ["Aktif", "Non-Aktif", "Lulus"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
