<?php

namespace Database\Seeders\ISTTS_KAMPUS;

use App\Models\istts_kampus\User as Istts_kampusUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserKampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Samuel Gunawan",
                "username" => "samgun",
                "email" => "samuel_20@mhs.istts.ac.id",
                "password" => Hash::make("samgun"),
                "role" => "baa",
                "status" => "Active",
            ],
            [
                "name" => "Kevin Setiono",
                "username" => "kevinsetiono",
                "email" => "kevinsetiono@stts.edu",
                "password" => Hash::make("kevinsetiono"),
                "role" => "baa",
                "status" => "Non-Active",
            ],
        ];

        Istts_kampusUser::insert($users);
    }
}
