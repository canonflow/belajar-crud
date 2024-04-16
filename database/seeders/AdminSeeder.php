<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = User::where('role', 'admin')->get()->pluck('id');

        for ($i = 1; $i <= count($adminId); $i++) {
            Admin::create([
                'name' => "Admin $i",
                'user_id' => $adminId[$i - 1],
            ]);
        }
    }
}
