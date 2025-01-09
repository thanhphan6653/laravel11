<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::insert([
            [
                'name_project' => 'Project PHP',
                'begin_date' => '2024-01-01',
                'end_date' => '2024-06-30',
                'proceeds' => 100000.00,
                'id_project_manager' => 1, // John Doe
            ],
            [
                'name_project' => 'Project C#',
                'begin_date' => '2024-02-01',
                'end_date' => '2024-07-31',
                'proceeds' => 200000.00,
                'id_project_manager' => 2, // Jane Smith
            ],
        ]);
    }
}


