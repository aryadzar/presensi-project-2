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
             "id_unit_kerja" => "c04bd838-a38d-4761-93f8-25f04a768b69",
             "id_user" => "f83bfbad-4a56-4627-ac5d-d0eccc0fccc5",
             "id_actor" => "7ec51d40-7e68-4592-ac34-7c53b44a76df"
        ]);
    }
}
