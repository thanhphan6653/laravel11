<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectDetail;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectDetail::insert([
            [
                'id_project' => 1, // Project Alpha
                'id_employee' => 1,    // John Doe
                'working_hours' => 120,
            ],
            [
                'id_project' => 1,
                'id_employee' => 2,    // Jane Smith
                'working_hours' => 100,
            ],
            [
                'id_project' => 2, // Project Beta
                'id_employee' => 3,    // Alice Johnson
                'working_hours' => 140,
            ],
        ]);
    }
}
