<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Computer Science',
            'Business Administration',
            'Graphic Design',
            'Information Technology',
        ];

        foreach ($departments as $name) {
            Department::firstOrCreate([
                'dept_name' => $name,
            ]);
        }
    }
}