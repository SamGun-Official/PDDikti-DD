<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\istts_dosen\NilaiSeeder;
use Database\Seeders\ISTTS_DOSEN\UserDosenSeeder;
use Illuminate\Database\Seeder;

class DatabaseDosenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserDosenSeeder::class]);
        $this->call([NilaiSeeder::class]);
    }
}
