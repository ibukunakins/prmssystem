<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Accident & Emergency',
                'code' => 'AEM'
            ],
            [
                'name' => 'General Outpatient Department',
                'code' => 'GPD'
            ],
            [
                'name' => 'Laboratory and Investigation',
                'code' => 'LAB'
            ],
            [
                'name' => 'Pharmacy and Medication',
                'code' => 'PHM'
            ],
            [
                'name' => 'Nursing and Care',
                'code' => 'NAC'
            ],
        ];
        Department::insert($departments);

    }
}
