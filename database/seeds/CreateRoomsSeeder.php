<?php

use Illuminate\Database\Seeder;

class CreateRoomsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('rooms')->truncate();

        $animals = [
            'いぬさん',
            'ねこさん',
            'ぞうさん',
            'きりんさん',
            'うさぎさん',
            'かめさん',
            'きつねさん',
            'たぬきさん',
            'らいおんさん',
            'かばさん',
        ];

        DB::table('rooms')->truncate();

        for ($i = 0; $i <= 9; $i++) {
            DB::table('rooms')->insert([
                'name' => $animals[$i],
                'description' => '雑談用のチャットルームです',
                'publish' => 'public',
                'creator' => 'ASS',
                'room_id' => hash('md5', mt_rand())
            ]);
        }
    }
}
