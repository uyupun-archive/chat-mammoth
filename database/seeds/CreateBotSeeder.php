<?php

use Illuminate\Database\Seeder;

class CreateBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'screen_name' => 'Bot',
            'user_id' => 'bot',
            'avatar' => '/avatar/bot.png'
        ]);
    }
}
