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
        // \App\Models\Channel::factory(10)->create();
        // \App\Models\User::factory(3)->create();
        \App\Models\Customer::factory(15)->create();
    }
}
