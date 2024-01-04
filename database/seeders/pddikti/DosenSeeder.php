<?php

namespace Database\Seeders\pddikti;

use App\Models\pddikti\Dosen as PddiktiDosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            [
                "nidn_dosen" => "0235214543",
                "nik" => "0343830170962755",
                "nama_lengkap" => "Arya Tandy Hermawan",
                "jenis_kelamin" => "Laki-laki",
                "email" => "arya@stts.edu",
                "tanggal_lahir" => "1966-01-01",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jabatan_fungsional" => "Lektor",
                "pendidikan_terakhir" => "S2",
                "ikatan_kerja" => "Tetap",
                "program_studi" => "Teknik Elektro",
                "status" => "Aktif",
            ],
            [
                "nidn_dosen" => "1244727883",
                "nik" => "0667040557933663",
                "nama_lengkap" => "Kevin Setiono",
                "jenis_kelamin" => "Laki-laki",
                "email" => "kevinsetiono@stts.edu",
                "tanggal_lahir" => "1995-01-01",
                "asal_kampus" => "INSTITUT SAINS DAN TEKNOLOGI TERPADU SURABAYA",
                "jabatan_fungsional" => "Tenaga Kependidikan",
                "pendidikan_terakhir" => "S2",
                "ikatan_kerja" => "Tetap",
                "program_studi" => "Informatika",
                "status" => "Aktif",
            ],
        ];

        PddiktiDosen::insert($dosen);
    }
}
