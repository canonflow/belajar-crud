<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            'admin' => [
                ['username' => 'admin', 'password' => '123'],
            ],
            'student' => [
                ['username' => 'student1', 'password' => '123'],
                ['username' => 'student2', 'password' => '123'],
                ['username' => 'student3', 'password' => '123'],
            ],
            'lecturer' => [
                ['username' => 'lecturer1', 'password' => '123'],
                ['username' => 'lecturer2', 'password' => '123'],
            ]
        ];

        foreach ($data as $role => $values) {
            foreach ($values as $attribute) {
                User::create([
                    'username' => $attribute['username'],
                    'password' => Hash::make($attribute['password']),
                    'role' => $role
                ]);
            }
        }
    }
}
