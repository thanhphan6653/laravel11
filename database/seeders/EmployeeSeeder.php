<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            [
                'employee_name' => 'Nguyen Van A',
                'address' => '111 Tran Phu',
                'salary' => 5000.00,
                'gender' => 1, // Nam
                'date_of_birth' => '1990-05-15',
                'join_date' => '2020-01-01',
                'id_employee_manager' => 0,
                'id_department' => 1, // Phòng Human Resources
            ],
            [
                'employee_name' => 'Le Thi B',
                'address' => '123 NVL',
                'salary' => 6000.00,
                'gender' => 0, // Nữ
                'date_of_birth' => '1985-08-20',
                'join_date' => '2018-02-01',
                'id_employee_manager' => 1,
                'id_department' => 2, // Phòng Finance
            ],
            [
                'employee_name' => 'Nguyen Van C',
                'address' => '789 Bach Dang',
                'salary' => 7000.00,
                'gender' => 0,
                'date_of_birth' => '1992-11-30',
                'join_date' => '2019-03-15',
                'id_employee_manager' => 2,
                'id_department' => 3, // Phòng IT
            ],
        ]);
    }
}
