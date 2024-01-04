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
        // Dosen pindah kampus = Update data dosen yang sudah ada, bukan buat baru seperti kasusnya mahasiswa pindah kampus
        Schema::create('dosen', function (Blueprint $table) {
            $table->string("nidn")->primary(); // Contoh: 0708036103
            $table->string("nik")->unique();
            $table->string("nama_lengkap");
            $table->enum("jenis_kelamin", ["Laki-laki", "Perempuan"]);
            $table->string("email");
            $table->date("tanggal_lahir");
            $table->string("asal_kampus"); // Contoh: INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA
            $table->string("jabatan_fungsional");
            $table->enum("pendidikan_terakhir", ["S1", "S2", "S3"]);
            $table->enum("ikatan_kerja", ["Tetap", "Kontrak"]);
            $table->enum("program_studi", [
                "Sistem Informasi",
                "Teknik Elektro",
                "Informatika",
                "Teknik Industri",
                "Sistem Informasi Bisnis",
                "Informatika Profesional",
                "Desain Produk",
                "Desain Komunikasi Visual",
            ]);
            $table->enum("status", ["Aktif", "Non-Aktif"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
