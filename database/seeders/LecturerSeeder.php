<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturerId = User::where('role', 'lecturer')
            ->get()
            ->pluck('id');

        for ($i = 1; $i <= count($lecturerId); $i++) {
            Lecturer::create([
                'name' => "Lecturer $i",
                'user_id' => $lecturerId[$i - 1],
            ]);
        }
    }
}
