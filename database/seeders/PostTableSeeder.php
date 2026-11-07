<?php

namespace database\Seeders;

use Illuminate\database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'title' => 'Post Judul Ke-' . $i,
                'description' => 'Deskripsi post ke-' . $i,
            ]);
        }
    }
}
