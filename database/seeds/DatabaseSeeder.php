<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CreateRoomsSeeder::class);
         $this->call(CreateAnonymousSeeder::class);
         $this->call(CreateBotSeeder::class);
    }
}
