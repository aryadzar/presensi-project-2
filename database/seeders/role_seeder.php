<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                "nama_role" => "Admin"
            ],
            [
                "nama_role" => "Operator"
            ],
            [
                "nama_role" => "Karyawan"
            ]
        ];


        foreach($role as $i){
            Role::create($i);
        }
    }
}
