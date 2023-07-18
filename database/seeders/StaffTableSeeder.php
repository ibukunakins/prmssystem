<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role_id', 5)->get();
        $staffs = [];
        foreach($users as $user){
            $staff = [
                'user_id' => $user->id,
                'first_name' => fake()->firstName,
                'last_name' => fake()->lastName,
                'middle_name' => fake()->firstName,
               'address' => fake()->address,
                'title' => fake()->randomElement(['Staff Nurse', 'Receptionist', 'Resident Doctor', 'Consultant', 'Pharmacist I']),
                'phone' => fake()->e164PhoneNumber,
                'dob' => fake()->date(),
                'email' => fake()->email,
                'gender' => fake()->randomElement(['m', 'f', 'o']),
                'city' => fake()->city,
                'post_code' => fake()->postcode,
                'marital_status' => fake()->randomElement(['m', 's', 'd', 'w']),
                'department_id' => rand(1, 5)
            ];
            $staffs[] = $staff;
        }
        Staff::insert($staffs);
    }
}
