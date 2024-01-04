<?php

namespace Database\Seeders\istts_kampus;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = [
            [
                "nrp_mahasiswa" => "220116919",
                "nama_lengkap" => "Ignatius Odi",
                "jenis_kelamin" => "Laki-laki",
                "tanggal_lahir" => "2002-05-21",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenjang" => "S1",
                "semester_awal" => "Ganjil 2020/2021",
                "status" => "Aktif",
            ],
            [
                "nrp_mahasiswa" => "220116921",
                "nama_lengkap" => "John Louis Airlangga",
                "jenis_kelamin" => "Laki-laki",
                "tanggal_lahir" => "2001-09-21",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenjang" => "S1",
                "semester_awal" => "Ganjil 2020/2021",
                "status" => "Aktif",
            ],
            [
                "nrp_mahasiswa" => "220116928",
                "nama_lengkap" => "Samuel Gunawan",
                "jenis_kelamin" => "Laki-laki",
                "tanggal_lahir" => "2002-07-01",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenjang" => "S1",
                "semester_awal" => "Ganjil 2020/2021",
                "status" => "Aktif",
            ]
        ];

        Mahasiswa::insert($mahasiswa);
    }
}
