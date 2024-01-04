<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\istts_kampus\KelasSeeder;
use Database\Seeders\istts_kampus\MahasiswaSeeder;
use Database\Seeders\istts_kampus\MataKuliahSeeder;
use Database\Seeders\istts_kampus\PeriodeSeeder;
use Database\Seeders\ISTTS_KAMPUS\UserKampusSeeder;
use Illuminate\Database\Seeder;

class DatabaseKampusSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserKampusSeeder::class]);
        $this->call([MahasiswaSeeder::class]);
        $this->call([PeriodeSeeder::class]);
        $this->call([MataKuliahSeeder::class]);
        $this->call([KelasSeeder::class]);
    }
}
