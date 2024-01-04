<?php

namespace Database\Seeders\istts_kampus;

use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mata_kuliah = [
            [
                "kode_matkul" => "IF641",
                "nama_matkul" => "Embedded Systems",
                "kode_kelas" => "X",
                "id_periode" => "ISTTS006",
                "nidn_dosen" => "0235214543",
                "sks" => "3",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "status" => 1,
            ],
            [
                "kode_matkul" => "IN982",
                "nama_matkul" => "Distributed Database",
                "kode_kelas" => "X",
                "id_periode" => "ISTTS007",
                "nidn_dosen" => "1244727883",
                "sks" => "3",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "status" => 1,
            ],
        ];

        MataKuliah::insert($mata_kuliah);
    }
}
