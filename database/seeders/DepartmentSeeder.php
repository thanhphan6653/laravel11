<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'department_name' => "Human Resources",
                'id_head_of_department' => 1, // Giả sử ID của trưởng phòng là 1
                'day_take' => '2023-01-01',
            ],

            [
                'department_name' => 'Finance',
                'id_head_of_department' => 2,
                'day_take' => '2023-02-01',
            ],
            [
                'department_name' => 'IT',
                'id_head_of_department' => 3,
                'day_take' => '2023-03-01',
            ],
        ]);
    }
}
