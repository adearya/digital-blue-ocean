<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\Refereed;
use App\Models\Status;
use App\Models\DataType;

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
         User::create([
             "name" => "Admin DBO",
             "username" => "admindbo",
             "email" => "admindbo@gmail.com",
             "password" => bcrypt("01101001"),
             "is_admin" => 1,
         ]);

        // Category::factory(3)->create();
        // Category::create([
        //     "name" => "Sistem Komputer",
        //     "slug" => "sistem-komputer",
        // ]);
        // Categories::create([
        //     "name" => "Sistem Komputer",
        //     "slug" => "sistem-komputer",
        // ]);

        // Collection::factory(20)->create();
        // Collections::factory(20)->create();
        // Collections::create([
        //     "title" => "Machine Learning dalam Sistem Komputer di era modern",
        //     "slug" => "Machine-Learning-dalam-Sistem-Komputer-di-era-modern",
        //     "file_upload" => "file.pdf",
        //     "category_id" => 1,
        //     "user_id" => 1,
        // ]);

        ItemType::create([
          "name" => "Article",
        ]);
        ItemType::create([
          "name" => "Book",
        ]);
        ItemType::create([
          "name" => "Thesis",
        ]);

        Language::create([
          "name" => "Indonesia",
        ]);
        Language::create([
          "name" => "English",
        ]);

        Refereed::create([
          "name" => "Yes, this version has been refereed.",
        ]);
        Refereed::create([
          "name" => "No, this version has not been refereed.",
        ]);

        Status::create([
          "name" => "Published",
        ]);
        Status::create([
          "name" => "In Press",
        ]);
        Status::create([
          "name" => "Submitted",
        ]);
        Status::create([
          "name" => "Unpublished",
        ]);

        DataType::create([
          "name" => "Publication",
        ]);
        DataType::create([
          "name" => "Submission",
        ]);
        DataType::create([
          "name" => "Completion",
        ]);
        DataType::create([
          "name" => "Unspecified",
        ]);

        Category::create([
          "name" => "Technology",
          "slug" => "technology",
        ]);
        Category::create([
          "name" => "General",
          "slug" => "general",
        ]);
    }
}
