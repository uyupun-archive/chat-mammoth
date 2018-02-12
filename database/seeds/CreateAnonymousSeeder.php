<?php

use Illuminate\Database\Seeder;

class CreateAnonymousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'screen_name' => 'Anonymous',
            'user_id' => 'anonymous',
        ]);
    }
}
