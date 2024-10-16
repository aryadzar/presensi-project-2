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
            // [
            //     "name" => "Sutarto",
            //     "id_sso" => "197207061995031002",
            //     "password" => bcrypt("password")
            // ],
            [
                "nama" => "Muhammad Arya Dzaky Arenanto",
                "NPM" => "2217051007",
                "password" => bcrypt("password"),
                "alamat" => "Lorem Ipsum",
                "no_telepon" => "029123121212",
                "asal_instansi" => "Universitas Lampung",
                "soft_delete" => 0
            ],
            // [
            //     "nama" => "M Abdul Adhim",
            //     "NPM" => "2217051030",
            //     "password" => bcrypt("password"),
            //     "alamat" => "Lorem Ipsum",
            //     "no_telepon" => "029123121212",
            //     "asal_instansi" => "Universitas Lampung",
            //     "soft_delete" => 0
            // ],
            // [
            //     "nama" => "Maharani Wahyu Tantri",
            //     "NPM" => "2217051051",
            //     "password" => bcrypt("password"),
            //     "alamat" => "Lorem Ipsum",
            //     "no_telepon" => "029123121212",
            //     "asal_instansi" => "Universitas Lampung",
            //     "soft_delete" => 0
            // ],
        ];

        foreach ($users as $user) {

            User::create($user);
        }
    }
}
