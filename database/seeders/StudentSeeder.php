<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Department;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'student_name' => 'Dara Sok',
                'gender' => 'Male',
                'dob' => '2004-05-12',
                'enrollment' => 'STU001',
                'enrollment_date' => '2024-01-15',
                'description' => 'Computer Science student',
                'department' => 'Computer Science',
            ],
            [
                'student_name' => 'Sophea Chan',
                'gender' => 'Female',
                'dob' => '2005-08-20',
                'enrollment' => 'STU002',
                'enrollment_date' => '2024-01-15',
                'description' => 'Business Administration student',
                'department' => 'Business Administration',
            ],
            [
                'student_name' => 'Lina Kim',
                'gender' => 'Female',
                'dob' => '2004-11-03',
                'enrollment' => 'STU003',
                'enrollment_date' => '2024-02-01',
                'description' => 'Graphic Design student',
                'department' => 'Graphic Design',
            ],
            [
                'student_name' => 'Vicheka Lim',
                'gender' => 'Male',
                'dob' => '2003-09-18',
                'enrollment' => 'STU004',
                'enrollment_date' => '2024-02-01',
                'description' => 'Information Technology student',
                'department' => 'Information Technology',
            ],
        ];

        foreach ($students as $data) {
            $department = Department::where(
                'dept_name',
                $data['department']
            )->firstOrFail();

            Student::updateOrCreate(
                ['enrollment' => $data['enrollment']],
                [
                    'student_name' => $data['student_name'],
                    'gender' => $data['gender'],
                    'dob' => $data['dob'],
                    'enrollment_date' => $data['enrollment_date'],
                    'description' => $data['description'],
                    'dept_id' => $department->dept_id,
                ]
            );
        }
    }
}