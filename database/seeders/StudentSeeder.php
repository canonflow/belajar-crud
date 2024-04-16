<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentId = User::where('role', 'student')
            ->get()
            ->pluck("id");
        $nrp = '160423';

        for ($i = 0; $i < count($studentId); $i++) {
            $urut = $i + 1;
            Student::create([
                'user_id' => $studentId[$i],
                'name' => "Student $urut",
                'nrp' => $nrp . str_pad("$urut", 3, "0", STR_PAD_LEFT),
            ]);
        }
    }
}
