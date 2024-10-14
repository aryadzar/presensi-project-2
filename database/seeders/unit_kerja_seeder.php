<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class unit_kerja_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit_kerja = [
            [
                "nama_unit" => "UPT TIK"
            ],
            [
                "nama_unit" => "Humas Unila"
            ]
        ];

        foreach ($unit_kerja as $i){
            UnitKerja::create($i);
        }
    }
}
