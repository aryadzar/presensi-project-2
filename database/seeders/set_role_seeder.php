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
             "id_role" => "9dd9617e-622c-410f-ac19-4f1425a8c381",
             "id_unit_kerja" => "30ba2d3c-5a5d-4748-9fe6-ae8941ca3b9f",
             "id_user" => "7211330d-a591-4112-aeaa-9c36bfd8e4be",
             "id_actor" => "7211330d-a591-4112-aeaa-9c36bfd8e4be"
        ]);
    }
}
