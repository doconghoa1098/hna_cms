<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Maker;
use App\Models\News;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
        // News::factory(10)->create();
        // Maker::factory(10)->create();
        // Product::factory(10)->create();
        // Category::factory(10)->create();
        
    }
}
