<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                "status" => "active",
            ],
            [
                "name" => "Samuel Gunawan",
                "username" => "samgun",
                "email" => "samuel_20@mhs.istts.ac.id",
                "password" => Hash::make("samgun"),
                "role" => "baa",
                "status" => "active",
            ],
            [
                "name" => "Kevin Setiono",
                "username" => "kevinsetiono",
                "email" => "kevinsetiono@stts.edu",
                "password" => Hash::make("kevinsetiono"),
                "role" => "baa",
                "status" => "non_active",
            ],
            [
                "name" => "John Louis Airlangga",
                "username" => "airlangga",
                "email" => "jlairlanggawj@gmail.com",
                "password" => Hash::make("airlangga"),
                "role" => "dosen",
                "status" => "active",
            ],
            [
                "name" => "Arya Tandy Hermawan",
                "username" => "arya",
                "email" => "arya@stts.edu",
                "password" => Hash::make("arya"),
                "role" => "dosen",
                "status" => "non_active",
            ],
        ];

        User::insert($users);
    }
}
