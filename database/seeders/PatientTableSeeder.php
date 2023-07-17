<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = User::where('role_id', 1)->get();
        $clients = [];
        foreach($patients as $patient){
            $client = [
                'user_id' => $patient->id,
                'title' => fake()->randomElement(['Mr', 'Miss', 'Mrs', 'Master']),
                'first_name' => fake()->firstName,
                'last_name' => fake()->lastName,
                'middle_name' => fake()->firstName,
                'address' => fake()->address,
                'phone' => fake()->phoneNumber,
                'dob' => fake()->date(),
                'gender' => fake()->randomElement(['m', 'f', 'o']),
                'city' => fake()->city,
                'post_code' => fake()->postcode,
                'contact_name' => fake()->name,
                'contact_phone' => fake()->e164PhoneNumber,
                'marital_status' => fake()->randomElement(['m', 's', 'd', 'w']),
            ];
            $clients[] = $client;
        }
        Patient::insert($clients);
    }
}
