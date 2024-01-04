<?php

namespace Database\Seeders\istts_kampus;

use App\Models\istts_kampus\Periode as Istts_kampusPeriode;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periode = [
            [
                "id_periode" => "ISTTS001",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Ganjil",
                "tahun_ajaran" => "2020/2021",
            ],
            [
                "id_periode" => "ISTTS002",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Genap",
                "tahun_ajaran" => "2020/2021",
            ],
            [
                "id_periode" => "ISTTS003",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Ganjil",
                "tahun_ajaran" => "2021/2022",
            ],
            [
                "id_periode" => "ISTTS004",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Genap",
                "tahun_ajaran" => "2021/2022",
            ],
            [
                "id_periode" => "ISTTS005",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Ganjil",
                "tahun_ajaran" => "2022/2023",
            ],
            [
                "id_periode" => "ISTTS006",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Genap",
                "tahun_ajaran" => "2022/2023",
            ],
            [
                "id_periode" => "ISTTS007",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Ganjil",
                "tahun_ajaran" => "2023/2024",
            ],
            [
                "id_periode" => "ISTTS008",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jenis_semester" => "Genap",
                "tahun_ajaran" => "2023/2024",
            ],
        ];

        Istts_kampusPeriode::insert($periode);
    }
}
