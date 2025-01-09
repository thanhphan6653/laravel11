<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Vo Dinh Huy',
            'email' => 'vodinhhuy@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
