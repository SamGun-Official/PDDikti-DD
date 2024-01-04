<?php

namespace Database\Seeders\istts_dosen;

use App\Models\istts_dosen\Nilai as Istts_dosenNilai;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilai = [
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116919",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116921",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116928",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116919",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116921",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116928",
                "nilai_uts" => 100,
                "nilai_uas" => 100,
                "nilai_akhir" => 100,
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
        ];

        Istts_dosenNilai::insert($nilai);
    }
}
