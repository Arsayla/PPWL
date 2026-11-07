<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class RandomPostSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            Post::create([
                'title' => fake()->unique()->sentence(3),
                'description' => fake()->sentence(),
            ]);
        }
    }
}
