<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // [
            //     "name" => "Nur Ainun",
            //     "id_sso" => " ",
            //     "password" => bcrypt("password")
            // ],
            [
                "name" => "Nur Afifah",
                "id_sso" => "2115061062",
                "password" => bcrypt("password")
            ],
            // [
            //     "name" => "Muhammad Arya Dzaky Arenanto",
            //     "id_sso" => "2217051007",
            //     "password" => bcrypt("password")
            // ],
            // [
            //     "name" => "M Abdul Adhim",
            //     "id_sso" => "2217051030",
            //     "password" => bcrypt("password")
            // ],
            // [
            //     "name" => "Maharani Wahyu Tantri",
            //     "id_sso" => "2217051051",
            //     "password" => bcrypt("password")
            // ],
        ];

        foreach ($users as $user) {

            User::create($user);
        }
    }
}
