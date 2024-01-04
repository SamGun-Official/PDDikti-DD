<?php

namespace Database\Seeders\PDDIKTI;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserPDDiktiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Ignatius Odi",
                "username" => "odi",
                "email" => "ignatius_o20@mhs.istts.ac.id",
                "password" => Hash::make("odi"),
                "role" => "pddikti",
                "status" => "Active",
            ],
        ];

        User::insert($users);
    }
}
