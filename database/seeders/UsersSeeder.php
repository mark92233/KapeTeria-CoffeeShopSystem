<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Sample Customer',
                'username' => 'customer',
                'email' => 'customer@example.com',
                'password' => 'password123',
                'role' => 'user',
                'phone' => '09171234567',
            ],
            [
                'name' => 'System Administrator',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'password123',
                'role' => 'admin',
                'phone' => '09181234567',
            ],
            [
                'name' => 'Coffee Shop Staff',
                'username' => 'staff',
                'email' => 'staff@example.com',
                'password' => 'password123',
                'role' => 'staff',
                'phone' => '09191234567',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                    'phone' => $user['phone'],
                ]
            );
        }
    }
}