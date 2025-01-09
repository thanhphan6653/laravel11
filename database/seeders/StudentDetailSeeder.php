<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_details')->insert([
            'student_id' => '1',
            'address' => 'Da Nang',
            'phone_number' => '0987654321',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
