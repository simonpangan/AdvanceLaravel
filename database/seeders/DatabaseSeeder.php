<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Channel::factory(10)->create();
        \App\Models\User::factory(2)->create();
       // \App\Models\Customer::factory(15)->create();
         \App\Models\Post::factory(3)->create();
         \App\Models\Tag::factory(4)->create();
         \App\Models\Video::factory()->create();
    }
}
