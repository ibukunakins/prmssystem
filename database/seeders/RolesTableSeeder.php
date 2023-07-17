<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 25,
                'name' => 'Admin',
                'description' => 'EMR Administrator'
            ],
            [
                'id' => 5,
                'name' => 'Staff',
                'description' => 'EMR Staff User'
            ],
            [
                'id' => 1,
                'name' => 'Patient',
                'description' => 'EMR Client'
            ]
        ];
        Role::insert($roles);
    }
}
