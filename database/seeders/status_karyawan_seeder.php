<?php

namespace Database\Seeders;

use App\Models\StatusKaryawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class status_karyawan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusKaryawan::create([
            "id_user" => "7211330d-a591-4112-aeaa-9c36bfd8e4be",
            "status" => "Magang / PKL"
        ]);
    }
}
