<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ppwl.test'],
            [
                'name' => 'Administrator',
                'password' => 'Admin12345!',
                'role' => 'admin',
            ]
        );
    }
}
