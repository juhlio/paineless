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
        //Client::factory(20)->create();
        //\App\Models\User::factory(100)->create();
        \App\Models\Client::factory(500)->create();
        //User::factory(20)->create();
    }
}
