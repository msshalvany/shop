<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->count(4)->create();
        \App\Models\Product::factory()->count(40)->create();
        \App\Models\admin::factory()->count(4)->create();
        \App\Models\slider::factory()->count(4)->create();
    }
}
