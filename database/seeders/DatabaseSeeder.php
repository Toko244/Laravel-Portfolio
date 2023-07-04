<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;
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

        About::factory()->count(1)->create();
        Banner::factory()->count(1)->create();
        Footer::factory()->count(1)->create();
        Partner::factory()->count(1)->create();
        Contact::factory()->count(5)->create();
        BlogCategory::factory()->count(1)->create();
        // User::factory()->count(1)->create();
        Service::factory()->count(5)->create();
        Blog::factory()->count(5)->create();
        Portfolio::factory()->count(5)->create();
    }
}
