<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory()->count(5)->create();
        // Membuat beberapa kategori
        Category::factory(5)->create();

        // Membuat beberapa posting
        Post::factory(50)->create();
    }
}
