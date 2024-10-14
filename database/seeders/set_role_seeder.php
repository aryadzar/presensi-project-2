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
             "id_role" => "b8e039be-abd9-4d91-9e61-4f3752080a12",
             "id_unit_kerja" => "c04bd838-a38d-4761-93f8-25f04a768b69",
             "id_user" => "7ec51d40-7e68-4592-ac34-7c53b44a76df",
             "id_actor" => "7ec51d40-7e68-4592-ac34-7c53b44a76df"
        ]);
    }
}
