<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'EMR Admin',
                'email' => 'admin@emrportal.com',
                'email_verified_at' => now(),
                'role_id' => 25,
                'username' => 'suadmin',
                'password' => bcrypt('Admin$9876'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'EMR Admin II',
                'email' => 'admin2@emrportal.com',
                'email_verified_at' => now(),
                'role_id' => 25,
                'username' => 'admin',
                'password' => bcrypt('Admin$9876'),
                'remember_token' => Str::random(10),
            ]
        ];
        User::insert($admins);
        User::factory(100)->create();
    }
}
