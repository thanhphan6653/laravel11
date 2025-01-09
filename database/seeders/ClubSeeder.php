<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clubs')->insert([
            'name' => 'Cau lac bo 1',
            'description' => 'Cau lac bo 1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
