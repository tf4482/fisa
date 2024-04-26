<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'user',
                'email' => 'user@example.org',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@example.org',
            ],
            [
                'name' => 'testuser',
                'email' => 'testuser@example.org',
            ],
            [
                'name' => 'super-admin',
                'email' => 'super-admin@example.org',
            ],
            [
                'name' => 'super-user',
                'email' => 'super-user@example.org',
            ],
            [
                'name' => 'guest',
                'email' => 'guest@example.org',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => '$2y$12$ywfstjhYbnjZacmKVcYJRubmx/j4.Q7GFNQfoRyJ0YCJxxiHdGqbu',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
