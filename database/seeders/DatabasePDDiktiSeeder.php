<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\PDDikti\UserPDDiktiSeeder;
use Illuminate\Database\Seeder;

class DatabasePDDiktiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserPDDiktiSeeder::class]);
    }
}
