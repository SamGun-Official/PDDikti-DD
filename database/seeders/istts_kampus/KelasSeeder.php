<?php

namespace Database\Seeders\istts_kampus;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116919",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116921",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IF641",
                "nrp_mahasiswa" => "220116928",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116919",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116921",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
            [
                "kode_matkul" => "IN982",
                "nrp_mahasiswa" => "220116928",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
            ],
        ];

        Kelas::insert($kelas);
    }
}
