<?php

namespace Database\Seeders\ISTTS_DOSEN;

use App\Models\istts_dosen\User as Istts_dosenUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "John Louis Airlangga",
                "username" => "airlangga",
                "email" => "jlairlanggawj@gmail.com",
                "password" => Hash::make("airlangga"),
                "role" => "dosen",
                "status" => "Active",
            ],
            [
                "name" => "Arya Tandy Hermawan",
                "username" => "arya",
                "email" => "arya@stts.edu",
                "password" => Hash::make("arya"),
                "role" => "dosen",
                "status" => "Non-Active",
            ],
        ];

        Istts_dosenUser::insert($users);
    }
}
