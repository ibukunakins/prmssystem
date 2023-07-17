<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(PatientTableSeeder::class);

    }
}
