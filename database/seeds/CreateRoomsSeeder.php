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

        for ($i = 1; $i <= 10; $i++) {
            DB::table('rooms')->insert([
                'name' => '雑談' . $i,
                'description' => '雑談用のチャットルームです',
                'publish' => 'public',
                'creator' => 'ASS',
                'room_id' => hash('adler32', mt_rand())
            ]);
        }
    }
}
