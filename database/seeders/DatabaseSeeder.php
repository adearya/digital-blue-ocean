<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)->create();
        // User::create([
        //     "name" => "Ade",
        //     "email" => "ade@gmail.com",
        //     "password" => bcrypt("password"),
        // ]);

        Category::factory(3)->create();
        // Category::create([
        //     "name" => "Sistem Komputer",
        //     "slug" => "sistem-komputer",
        // ]);
        // Categories::create([
        //     "name" => "Sistem Komputer",
        //     "slug" => "sistem-komputer",
        // ]);

        Post::factory(20)->create();
        // Collections::factory(20)->create();
        // Collections::create([
        //     "title" => "Machine Learning dalam Sistem Komputer di era modern",
        //     "slug" => "Machine-Learning-dalam-Sistem-Komputer-di-era-modern",
        //     "file_upload" => "file.pdf",
        //     "category_id" => 1,
        //     "user_id" => 1,
        // ]);
    }
}
