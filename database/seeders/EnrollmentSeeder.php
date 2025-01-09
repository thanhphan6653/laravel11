<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enrollments')->insert([
            'student_id' => '1',
            'course_name' => 'Tuyen dung A',
            'enrollment_date' => '2025-2-3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
