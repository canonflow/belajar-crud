<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'Object Oriented Programming' => "Gasal 2024/2025",
            'Mathematics' => "Gasal 2024/2025",
            'Statistics' => "Gasal 2024/2025",
            'Human Computer Interaction' => "Gasal 2024/2025",
            'Communicative English' => "Gasal 2024/2025",
        ];

        foreach ($courses as $course => $semester) {
            Course::create([
                'name' => $course,
                'semester' => $semester
            ]);
        }
    }
}
