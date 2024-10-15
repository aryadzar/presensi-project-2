<?php

namespace Database\Seeders;

use App\Models\SetRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class set_role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SetRole::create([
             "id_role" => "000234c7-450c-4d1c-91a1-76fb5d40e348",
             "id_unit_kerja" => "4a35e71e-c5d8-4b1f-b643-518697c1c755",
             "id_user" => "7ec51d40-7e68-4592-ac34-7c53b44a76df",
             "id_actor" => "7ec51d40-7e68-4592-ac34-7c53b44a76df"
        ]);
    }
}
