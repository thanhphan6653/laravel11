<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_clubs')->insert([
            'student_id' => '1',
            'club_id' => '1',
            'join_date' => '2025-2-3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
